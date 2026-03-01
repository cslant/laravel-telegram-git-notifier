<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\DTOs\ChatTarget;
use CSlant\TelegramGitNotifier\Exceptions\InvalidViewTemplateException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use CSlant\TelegramGitNotifier\Exceptions\SendNotificationException;
use CSlant\TelegramGitNotifier\Models\Setting;
use CSlant\TelegramGitNotifier\Notifier;
use CSlant\TelegramGitNotifier\Objects\Validator;
use Symfony\Component\HttpFoundation\Request;

class NotificationService
{
    protected readonly Request $request;

    /** @var list<ChatTarget> */
    protected readonly array $chatTargets;

    protected readonly Notifier $notifier;

    protected readonly Setting $setting;

    public function __construct(
        Notifier $notifier,
        Setting $setting,
    ) {
        $this->request = Request::createFromGlobals();
        $this->notifier = $notifier;
        $this->chatTargets = $this->notifier->getChatTargets();
        $this->setting = $setting;
    }

    /**
     * Handle to send notification from webhook event to telegram.
     *
     * @throws InvalidViewTemplateException
     * @throws SendNotificationException
     * @throws MessageIsEmptyException
     */
    public function handle(): void
    {
        $eventName = $this->notifier->handleEventFromRequest($this->request);
        if (!empty($eventName)) {
            $this->sendNotification($eventName);
        }
    }

    /**
     * @throws InvalidViewTemplateException
     * @throws SendNotificationException
     * @throws MessageIsEmptyException
     */
    private function sendNotification(string $event): void
    {
        if (!$this->validateAccessEvent($event)) {
            return;
        }

        foreach ($this->chatTargets as $target) {
            if ($target->chatId === '') {
                continue;
            }

            if (!$target->hasThreads()) {
                $this->notifier->sendNotify(null, ['chat_id' => $target->chatId]);

                continue;
            }

            foreach ($target->threadIds as $threadId) {
                $this->notifier->sendNotify(null, [
                    'chat_id' => $target->chatId,
                    'message_thread_id' => $threadId,
                ]);
            }
        }
    }

    /**
     * Validate access event.
     *
     * @throws InvalidViewTemplateException|MessageIsEmptyException
     */
    private function validateAccessEvent(string $event): bool
    {
        $payload = $this->notifier->setPayload($this->request, $event);
        $validator = new Validator($this->setting, $this->notifier->event);

        if (empty($payload) || !is_object($payload)) {
            return false;
        }

        return $validator->isAccessEvent(
            $this->notifier->event->platform,
            $event,
            $payload,
        );
    }
}
