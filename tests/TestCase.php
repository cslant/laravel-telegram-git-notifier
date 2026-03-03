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
        $app['config']->set('telegram-git-notifier.bot.token', 'test-bot-token');
        $app['config']->set('telegram-git-notifier.bot.chat_id', '-123456789');
        $app['config']->set('telegram-git-notifier.app.url', 'https://example.com/telegram-git-notifier');
        $app['config']->set('telegram-git-notifier.view.namespace', 'tg-notifier');
    }
}
