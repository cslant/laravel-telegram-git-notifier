<?php

namespace CSlant\LaravelTelegramGitNotifier\Providers;

use CSlant\LaravelTelegramGitNotifier\Commands\ChangeOwnerConfigJson;
use CSlant\LaravelTelegramGitNotifier\Commands\SetWebhook;
use CSlant\LaravelTelegramGitNotifier\Commands\WebhookStatus;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Notifier;
use CSlant\TelegramGitNotifier\Webhook;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use GuzzleHttp\Client;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Telegram;

class TelegramGitNotifierServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        $this->loadRoutes();
        $this->loadViews();
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'tg-notifier');
        $this->registerCommands();
        $this->registerAssetPublishing();
    }

    public function register(): void
    {
        $configPath = __DIR__ . '/../../config/telegram-git-notifier.php';
        $this->mergeConfigFrom($configPath, 'telegram-git-notifier');

        $this->registerBindings();
    }

    /**
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Telegram::class,
            Client::class,
            Bot::class,
            Notifier::class,
            WebhookInterface::class,
        ];
    }

    private function loadRoutes(): void
    {
        $routePath = __DIR__ . '/../../routes/bot.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }
    }

    private function loadViews(): void
    {
        $viewPath = __DIR__ . '/../../resources/views';
        if (file_exists($viewPath)) {
            $this->loadViewsFrom($viewPath, config('telegram-git-notifier.view.namespace'));
        }
    }

    private function registerBindings(): void
    {
        $this->app->singleton(Telegram::class, static function () {
            return new Telegram(config('telegram-git-notifier.bot.token'));
        });

        $this->app->singleton(Bot::class, function ($app) {
            return new Bot($app->make(Telegram::class));
        });

        $this->app->singleton(Notifier::class, static function () {
            return new Notifier();
        });

        $this->app->singleton(WebhookInterface::class, static function () {
            $webhook = new Webhook();
            $webhook->setToken(config('telegram-git-notifier.bot.token'));
            $webhook->setUrl(config('telegram-git-notifier.app.url'));

            return $webhook;
        });
    }

    protected function registerCommands(): void
    {
        $this->commands([
            ChangeOwnerConfigJson::class,
            SetWebhook::class,
            WebhookStatus::class,
        ]);
    }

    protected function registerAssetPublishing(): void
    {
        $configPath = __DIR__ . '/../../config/telegram-git-notifier.php';
        $this->publishes([
            $configPath => config_path('telegram-git-notifier.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../../resources/views' => config('telegram-git-notifier.defaults.paths.views'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../../lang' => resource_path('lang/vendor/tg-notifier'),
        ], 'lang');

        $this->publishes([
            __DIR__ . '/../../../telegram-git-notifier/config/jsons' => config('telegram-git-notifier.data_file.storage_folder'),
        ], 'config_jsons');
    }
}
