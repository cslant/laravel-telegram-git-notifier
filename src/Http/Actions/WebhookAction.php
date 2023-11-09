<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Webhook;

class WebhookAction
{
    protected Webhook $webhook;

    public function __construct()
    {
        $this->webhook = new Webhook();
        $this->webhook->setToken(config('telegram-git-notifier.bot.token'));
        $this->webhook->setUrl(config('telegram-git-notifier.app.url'));
    }

    /**
     * Set webhook for telegram bot.
     *
     * @return string
     *
     * @throws WebhookException
     */
    public function set(): string
    {
        return $this->webhook->setWebhook();
    }

    /**
     * Delete webhook for telegram bot.
     *
     * @return string
     *
     * @throws WebhookException
     */
    public function delete(): string
    {
        return $this->webhook->deleteWebHook();
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
        return $this->webhook->getUpdates();
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
        return $this->webhook->getWebHookInfo();
    }
}
