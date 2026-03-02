<?php

namespace CSlant\LaravelTelegramGitNotifier\Commands;

use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use CSlant\TelegramGitNotifier\Webhook;
use Illuminate\Console\Command;

class SetWebhook extends Command
{
    protected $signature = 'tg-notifier:webhook:set';

    protected $description = 'Set webhook for the Telegram bot';

    public function handle(): void
    {
        $url = (string) config('telegram-git-notifier.app.url');
        $this->components->info("Setting webhook to: {$url}");

        try {
            $webhook = app()->bound(WebhookInterface::class)
                ? app(WebhookInterface::class)
                : $this->createWebhook();

            $response = $webhook->setWebhook();
            $this->components->info('✅ Webhook set successfully');
            $this->line($response);
        } catch (WebhookException $e) {
            $this->components->error($e->getMessage());
        }
    }

    private function createWebhook(): WebhookInterface
    {
        $webhook = new Webhook();
        $webhook->setToken((string) config('telegram-git-notifier.bot.token'));
        $webhook->setUrl((string) config('telegram-git-notifier.app.url'));

        return $webhook;
    }
}
