<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

use CSlant\LaravelTelegramGitNotifier\Services\WebhookService;
use CSlant\TelegramGitNotifier\Exceptions\WebhookException;

class WebhookAction
{
    protected readonly WebhookService $webhookService;

    public function __construct(?WebhookService $webhookService = null)
    {
        $this->webhookService = $webhookService ?? new WebhookService();
    }

    /**
     * @throws WebhookException
     */
    public function set(): string
    {
        return $this->webhookService->setWebhook();
    }

    /**
     * @throws WebhookException
     */
    public function delete(): string
    {
        return $this->webhookService->deleteWebHook();
    }

    /**
     * @throws WebhookException
     */
    public function getUpdates(): string
    {
        return $this->webhookService->getUpdates();
    }

    /**
     * @throws WebhookException
     */
    public function getWebHookInfo(): string
    {
        return $this->webhookService->getWebHookInfo();
    }
}
