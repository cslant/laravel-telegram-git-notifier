<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use CSlant\TelegramGitNotifier\Webhook;

class WebhookService
{
    protected readonly WebhookInterface $webhook;

    public function __construct(?WebhookInterface $webhook = null)
    {
        $this->webhook = $webhook ?? new Webhook();
        $this->webhook->setToken(config('telegram-git-notifier.bot.token'));
        $this->webhook->setUrl(config('telegram-git-notifier.app.url'));
    }

    /**
     * @throws WebhookException
     */
    public function setWebhook(): string
    {
        return $this->webhook->setWebhook();
    }

    /**
     * @throws WebhookException
     */
    public function deleteWebHook(): string
    {
        return $this->webhook->deleteWebHook();
    }

    /**
     * @throws WebhookException
     */
    public function getUpdates(): string
    {
        return $this->webhook->getUpdates();
    }

    /**
     * @throws WebhookException
     */
    public function getWebHookInfo(): string
    {
        return $this->webhook->getWebHookInfo();
    }
}
