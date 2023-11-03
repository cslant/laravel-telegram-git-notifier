<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

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
     * @return false|string
     */
    public function set(): false|string
    {
        return $this->webhook->setWebhook();
    }

    /**
     * Delete webhook for telegram bot.
     *
     * @return false|string
     */
    public function delete(): false|string
    {
        return $this->webhook->deleteWebHook();
    }

    /**
     * Get webhook update.
     *
     * @return false|string
     */
    public function getUpdates(): false|string
    {
        return $this->webhook->getUpdates();
    }
}
