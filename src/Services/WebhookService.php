<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\LaravelTelegramGitNotifier\Http\Actions\WebhookAction;
use CSlant\TelegramGitNotifier\Exceptions\WebhookException;

class WebhookService
{
    protected WebhookAction $webhookAction;

    public function __construct(WebhookAction $webhookAction) {
        $this->webhookAction = $webhookAction;
    }


    /**
     * @throws WebhookException
     */
    public function handle(): string
    {
        return $this->webhookAction->set();
    }
}
