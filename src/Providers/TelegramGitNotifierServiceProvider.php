<?php

namespace CSlant\LaravelTelegramGitNotifier\Providers;

use CSlant\LaravelTelegramGitNotifier\Commands\ChangeOwnerConfigJson;
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
        $routePath = __DIR__.'/../../routes/bot.php';
        if (file_exists($routePath)) {
            $this->loadRoutesFrom($routePath);
        }

        $viewPath = __DIR__.'/../../resources/views';
        if (file_exists($viewPath)) {
            $this->loadViewsFrom($viewPath, config('telegram-git-notifier.view.namespace'));
        }

        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'tg-notifier');

        $this->registerCommands();

        $this->registerPublishes();
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

    /**
     * @return void
     */
    protected function registerCommands(): void
    {
        $this->commands([
            ChangeOwnerConfigJson::class,
        ]);
    }

    /**
     * @return void
     */
    protected function registerPublishes(): void
    {
        $configPath = __DIR__.'/../../config/telegram-git-notifier.php';
        $this->publishes([
            $configPath => config_path('telegram-git-notifier.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../resources/views' => config('telegram-git-notifier.defaults.paths.views'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../lang' => resource_path('lang/vendor/tg-notifier'),
        ], 'lang');

        $this->publishes([
            __DIR__.'/../../../telegram-git-notifier/config/jsons' => config('telegram-git-notifier.data_file.storage_folder'),
        ], 'config_jsons');
    }
}
