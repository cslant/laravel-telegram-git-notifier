<?php

declare(strict_types=1);

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\Exceptions\InvalidViewTemplateException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use CSlant\TelegramGitNotifier\Exceptions\SendNotificationException;
use CSlant\TelegramGitNotifier\Models\Setting;
use CSlant\TelegramGitNotifier\Notifier;
use CSlant\TelegramGitNotifier\Objects\Validator;
use Symfony\Component\HttpFoundation\Request;

class NotificationService
{
    /**
     * @var array<string, array<int|string>>
     */
    private array $chatIds = [];

    public function __construct(
        private Notifier $notifier,
        private Setting $setting,
        private Request $request
    ) {
        $this->initialize();
    }

    public static function create(Notifier $notifier, Setting $setting, ?Request $request = null): self
    {
        return new self(
            $notifier,
            $setting,
            $request ?? Request::createFromGlobals()
        );
    }

    private function initialize(): void
    {
        $this->chatIds = $this->notifier->parseNotifyChatIds();
    }

    /**
     * Handle sending notification from webhook event to Telegram.
     *
     * @throws InvalidViewTemplateException
     * @throws SendNotificationException
     * @throws MessageIsEmptyException
     */
    public function handle(): void
    {
        $eventName = $this->notifier->handleEventFromRequest($this->request);

        if ($eventName === null) {
            return;
        }

        $this->sendNotification($eventName);
    }

    /**
     * Send notification to all configured chat IDs and threads.
     *
     * @throws InvalidViewTemplateException
     * @throws SendNotificationException
     * @throws MessageIsEmptyException
     */
    private function sendNotification(string $event): void
    {
        if (!$this->isValidEvent($event)) {
            return;
        }

        foreach ($this->chatIds as $chatId => $threads) {
            if (empty($chatId)) {
                continue;
            }

            $this->sendToRecipients((string) $chatId, $threads);
        }
    }

    /**
     * Send notification to appropriate recipients (chat or threads).
     *
     * @param string $chatId The chat ID to send to
     * @param array<int|string> $threads Array of thread IDs (empty for direct chat)
     * @throws SendNotificationException
     */
    private function sendToRecipients(string $chatId, array $threads): void
    {
        if (empty($threads)) {
            $this->sendToChat($chatId);

            return;
        }

        $this->sendToThreads($chatId, $threads);
    }

    /**
     * Send notification to a single chat.
     *
     * @throws SendNotificationException
     */
    private function sendToChat(string $chatId): void
    {
        $this->notifier->sendNotify(null, [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Send notification to multiple threads in a chat.
     *
     * @param string $chatId The chat ID containing the threads
     * @param array<int|string> $threads Array of thread IDs
     * @throws SendNotificationException
     */
    private function sendToThreads(string $chatId, array $threads): void
    {
        foreach ($threads as $threadId) {
            $this->sendToThread($chatId, (string) $threadId);
        }
    }

    /**
     * Send notification to a specific thread in a chat.
     *
     * @param string $chatId The chat ID
     * @param string $threadId The thread ID
     * @throws SendNotificationException
     */
    private function sendToThread(string $chatId, string $threadId): void
    {
        $this->notifier->sendNotify(null, [
            'chat_id' => $chatId,
            'message_thread_id' => $threadId,
        ]);
    }

    /**
     * Check if the event is valid and accessible.
     */
    private function isValidEvent(string $event): bool
    {
        $payload = $this->notifier->setPayload($this->request, $event);

        if (empty($payload) || !is_object($payload)) {
            return false;
        }

        return $this->validateEventAccess($event, $payload);
    }

    /**
     * Validate if the event has access.
     *
     * @param string $event The event name
     * @param object $payload The event payload
     */
    private function validateEventAccess(string $event, object $payload): bool
    {
        $validator = new Validator($this->setting, $this->notifier->event);

        return $validator->isAccessEvent(
            $this->notifier->event->platform,
            $event,
            $payload
        );
    }
}
