<?php

namespace CSlant\LaravelTelegramGitNotifier\Tests;

use CSlant\LaravelTelegramGitNotifier\Providers\TelegramGitNotifierServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            TelegramGitNotifierServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Use the core package's config files directly - use absolute path
        // dirname(__DIR__) returns the tests directory, so we need to go up one more level
        $coreConfigPath = dirname(__DIR__, 2).'/telegram-git-notifier/config/jsons';

        $app['config']->set('telegram-git-notifier.bot.token', 'test-bot-token');
        $app['config']->set('telegram-git-notifier.bot.chat_id', '-123456789');
        $app['config']->set('telegram-git-notifier.app.url', 'https://example.com/telegram-git-notifier');
        $app['config']->set('telegram-git-notifier.view.namespace', 'tg-notifier');

        // Set the data file paths to use the core package's config
        $app['config']->set('telegram-git-notifier.data_file.storage_folder', $coreConfigPath);
        $app['config']->set('telegram-git-notifier.data_file.setting', $coreConfigPath.'/tgn-settings.json');
        $app['config']->set('telegram-git-notifier.data_file.platform.github', $coreConfigPath.'/github-events.json');
        $app['config']->set('telegram-git-notifier.data_file.platform.gitlab', $coreConfigPath.'/gitlab-events.json');
    }
}
