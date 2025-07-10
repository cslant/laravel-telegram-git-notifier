<?php

declare(strict_types=1);

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use CSlant\TelegramGitNotifier\Webhook;
use Illuminate\Support\Facades\Config;

class WebhookService
{
    private const CONFIG_PREFIX = 'telegram-git-notifier';

    public function __construct(
        private WebhookInterface $webhook
    ) {
        $this->initializeWebhook();
    }

    public static function createDefault(): self
    {
        $webhook = new Webhook();
        $webhook->setToken(Config::get(self::CONFIG_PREFIX . '.bot.token'));
        $webhook->setUrl(Config::get(self::CONFIG_PREFIX . '.app.url'));

        return new self($webhook);
    }

    /**
     * Set webhook for telegram bot.
     *
     * @throws WebhookException
     */
    public function setWebhook(): string
    {
        return $this->webhook->setWebhook();
    }

    /**
     * Delete webhook for telegram bot.
     *
     * @throws WebhookException
     */
    public function deleteWebHook(): string
    {
        return $this->webhook->deleteWebHook();
    }

    /**
     * Get webhook update.
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
     * @throws WebhookException
     */
    public function getWebHookInfo(): string
    {
        return $this->webhook->getWebHookInfo();
    }

    private function initializeWebhook(): void
    {
        if ($this->webhook->getToken() === null) {
            $this->webhook->setToken(Config::get(self::CONFIG_PREFIX . '.bot.token'));
        }

        if ($this->webhook->getUrl() === null) {
            $this->webhook->setUrl(Config::get(self::CONFIG_PREFIX . '.app.url'));
        }
    }
}
