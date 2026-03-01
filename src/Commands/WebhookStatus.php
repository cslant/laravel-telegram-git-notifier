<?php

namespace CSlant\LaravelTelegramGitNotifier\Commands;

use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use CSlant\TelegramGitNotifier\Webhook;
use Illuminate\Console\Command;

class WebhookStatus extends Command
{
    protected $signature = 'tg-notifier:webhook:status';

    protected $description = 'Show current webhook status and configuration';

    public function handle(): void
    {
        try {
            $webhook = app()->bound(WebhookInterface::class)
                ? app(WebhookInterface::class)
                : $this->createWebhook();

            $info = json_decode($webhook->getWebHookInfo(), true);

            if (!is_array($info) || !isset($info['ok'])) {
                $this->components->error('Failed to parse webhook info');

                return;
            }

            $result = $info['result'] ?? [];
            $url = $result['url'] ?? '(not set)';
            $pending = $result['pending_update_count'] ?? 0;
            $lastError = $result['last_error_message'] ?? 'none';

            $this->components->twoColumnDetail('Webhook URL', $url);
            $this->components->twoColumnDetail('Pending Updates', (string) $pending);
            $this->components->twoColumnDetail('Last Error', $lastError);
            $this->components->twoColumnDetail('Bot Token', $this->maskToken());
            $this->newLine();

            if ($url === '(not set)' || $url === '') {
                $this->components->warn('Webhook is not configured. Run: php artisan tg-notifier:webhook:set');
            } else {
                $this->components->info('✅ Webhook is active');
            }
        } catch (WebhookException $e) {
            $this->components->error($e->getMessage());
        }
    }

    private function createWebhook(): WebhookInterface
    {
        $webhook = new Webhook();
        $webhook->setToken(config('telegram-git-notifier.bot.token'));
        $webhook->setUrl(config('telegram-git-notifier.app.url'));

        return $webhook;
    }

    private function maskToken(): string
    {
        $token = config('telegram-git-notifier.bot.token', '');

        if (strlen($token) < 10) {
            return '***';
        }

        return substr($token, 0, 5) . '...' . substr($token, -4);
    }
}
