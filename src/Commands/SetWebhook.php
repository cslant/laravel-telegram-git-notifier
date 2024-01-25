<?php

namespace CSlant\LaravelTelegramGitNotifier\Commands;

use CSlant\LaravelTelegramGitNotifier\Services\WebhookService;
use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use Illuminate\Console\Command;

class SetWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tg-notifier:webhook:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set webhook';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $log = (new WebhookService())->setWebhook();

            $this->info($log);
        } catch (WebhookException $e) {
            $this->error($e->getMessage());
        }
    }
}
