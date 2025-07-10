<?php

declare(strict_types=1);

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

use CSlant\LaravelTelegramGitNotifier\Services\WebhookService;
use CSlant\TelegramGitNotifier\Exceptions\WebhookException;

class WebhookAction
{
    public function __construct(
        private readonly WebhookService $webhookService
    ) {
    }

    /**
     * Set webhook for telegram bot.
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
     * @throws WebhookException
     */
    public function delete(): string
    {
        return $this->webhookService->deleteWebHook();
    }

    /**
     * Get webhook update.
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
     * @throws WebhookException
     */
    public function getWebHookInfo(): string
    {
        return $this->webhookService->getWebHookInfo();
    }
}
