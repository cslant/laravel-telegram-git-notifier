<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\Exceptions\{
    InvalidViewTemplateException,
    MessageIsEmptyException,
    SendNotificationException
};
use CSlant\TelegramGitNotifier\Models\Setting;
use CSlant\TelegramGitNotifier\Notifier;
use CSlant\TelegramGitNotifier\Objects\Validator;
use Symfony\Component\HttpFoundation\Request;

class NotificationService
{
    /** @var array<string, array<int|string>> */
    protected array $chatIds = [];

    public function __construct(
        protected Notifier $notifier,
        protected Setting $setting,
        protected Request $request = new Request()
    ) {
        $this->request = $request ?? Request::createFromGlobals();
        $this->chatIds = $notifier->parseNotifyChatIds();
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
        if ($eventName = $this->notifier->handleEventFromRequest($this->request)) {
            $this->sendNotification($eventName);
        }
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

            empty($threads) 
                ? $this->sendToChat($chatId)
                : $this->sendToThreads($chatId, $threads);
        }
    }

    /**
     * Send notification to a single chat.
     *
     * @throws SendNotificationException
     */
    private function sendToChat(string $chatId): void
    {
        $this->notifier->sendNotify(null, ['chat_id' => $chatId]);
    }

    /**
     * Send notification to multiple threads in a chat.
     *
     * @param  array<int|string>  $threads
     *
     * @throws SendNotificationException
     */
    private function sendToThreads(string $chatId, array $threads): void
    {
        foreach ($threads as $threadId) {
            $this->notifier->sendNotify(null, [
                'chat_id' => $chatId,
                'message_thread_id' => $threadId,
            ]);
        }
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

        $validator = new Validator($this->setting, $this->notifier->event);
        
        return $validator->isAccessEvent(
            $this->notifier->event->platform,
            $event,
            $payload
        );
    }
}
