<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use CSlant\TelegramGitNotifier\Webhook;

class WebhookService
{
    protected WebhookInterface $webhookInterface;

    public function __construct(?WebhookInterface $webhookInterface = null)
    {
        $this->webhookInterface = $webhookInterface ?? new Webhook();
        $this->webhookInterface->setToken(config('telegram-git-notifier.bot.token'));
        $this->webhookInterface->setUrl(config('telegram-git-notifier.app.url'));
    }

    /**
     * Set webhook for telegram bot.
     *
     * @return string
     *
     * @throws WebhookException
     */
    public function setWebhook(): string
    {
        return $this->webhookInterface->setWebhook();
    }

    /**
     * Delete webhook for telegram bot.
     *
     * @return string
     *
     * @throws WebhookException
     */
    public function deleteWebHook(): string
    {
        return $this->webhookInterface->deleteWebHook();
    }

    /**
     * Get webhook update.
     *
     * @return string
     *
     * @throws WebhookException
     */
    public function getUpdates(): string
    {
        return $this->webhookInterface->getUpdates();
    }

    /**
     * Get webhook info.
     *
     * @return string
     *
     * @throws WebhookException
     */
    public function getWebHookInfo(): string
    {
        return $this->webhookInterface->getWebHookInfo();
    }
}
