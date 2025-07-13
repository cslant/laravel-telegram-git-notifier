<?php

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
    protected Request $request;

    /**
     * @var array<int|string>
     */
    protected array $chatIds = [];

    protected Notifier $notifier;

    protected Setting $setting;

    public function __construct(
        Notifier $notifier,
        Setting $setting,
    ) {
        $this->request = Request::createFromGlobals();
        $this->notifier = $notifier;
        $this->chatIds = $this->notifier->parseNotifyChatIds();

        $this->setting = $setting;
    }

    /**
     * Handle to send notification from webhook event to telegram.
     *
     * @return void
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
     * @param  string  $event
     * @return void
     *
     * @throws InvalidViewTemplateException
     * @throws SendNotificationException
     * @throws MessageIsEmptyException
     */
    private function sendNotification(string $event): void
    {
        if (!$this->validateAccessEvent($event)) {
            return;
        }

        foreach ($this->chatIds as $chatId => $thread) {
            if (empty($chatId)) {
                continue;
            }

            if (empty($thread)) {
                $this->notifier->sendNotify(null, ['chat_id' => $chatId]);

                continue;
            }

            /** @var array<int|string> $thread */
            foreach ($thread as $threadId) {
                $this->notifier->sendNotify(null, [
                    'chat_id' => $chatId, 'message_thread_id' => $threadId,
                ]);
            }
        }
    }

    /**
     * Validate access event.
     *
     * @param  string  $event
     * @return bool
     *
     * @throws InvalidViewTemplateException|MessageIsEmptyException
     */
    private function validateAccessEvent(string $event): bool
    {
        $payload = $this->notifier->setPayload($this->request, $event);
        $validator = new Validator($this->setting, $this->notifier->event);

        if (empty($payload) || !is_object($payload)
            || !$validator->isAccessEvent(
                $this->notifier->event->platform,
                $event,
                $payload
            )
        ) {
            return false;
        }

        return true;
    }
}
