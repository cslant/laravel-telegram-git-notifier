<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

use CSlant\LaravelTelegramGitNotifier\Services\WebhookService;
use CSlant\TelegramGitNotifier\Exceptions\WebhookException;

class WebhookAction
{
    protected WebhookService $webhookService;

    public function __construct()
    {
        $this->webhookService = new WebhookService();
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
        return $this->webhookService->setWebhook();
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
        return $this->webhookService->deleteWebHook();
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
        return $this->webhookService->getUpdates();
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
        return $this->webhookService->getWebHookInfo();
    }
}
