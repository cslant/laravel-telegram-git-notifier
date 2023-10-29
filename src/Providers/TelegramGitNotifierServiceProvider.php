<?php

namespace LbilTech\LaravelTelegramGitNotifier\Providers;

use Illuminate\Support\ServiceProvider;

class TelegramGitNotifierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $configPath = __DIR__.'/../../config/telegram-git-notifier.php';
        $this->publishes([
            $configPath => config_path('telegram-git-notifier.php'),
        ], 'config');

        $routePath = __DIR__.'/../../routes/bot.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }

        $viewPath = __DIR__.'/../../resources/views';
        if (file_exists($routePath)) {
            $this->loadViewsFrom($viewPath, 'telegram-git-notifier');
        }

        $this->publishes([
            __DIR__.'/../../resources/views' => base_path('resources/views/vendor/telegram-git-notifier'),
        ], 'views');

        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'telegram-git-notifier');

        $this->publishes([
            __DIR__.'/../../lang' => resource_path('lang/vendor/telegram-git-notifier'),
        ], 'lang');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $configPath = __DIR__.'/../../config/telegram-git-notifier.php';
        $this->mergeConfigFrom($configPath, 'telegram-git-notifier');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array|null
     */
    public function provides(): ?array
    {
        return ['telegram-git-notifier'];
    }
}
