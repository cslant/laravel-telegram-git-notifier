<?php

use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;
use CSlant\TelegramGitNotifier\Notifier;
use CSlant\TelegramGitNotifier\Webhook;
use GuzzleHttp\Client;
use Telegram;

it('binds Telegram client as singleton', function () {
    $telegram1 = app(Telegram::class);
    $telegram2 = app(Telegram::class);

    expect($telegram1)->toBeInstanceOf(Telegram::class)
        ->and($telegram1)->toBe($telegram2);
});

it('binds Bot as singleton', function () {
    $bot1 = app(Bot::class);
    $bot2 = app(Bot::class);

    expect($bot1)->toBeInstanceOf(Bot::class)
        ->and($bot1)->toBe($bot2);
});

it('binds Notifier as singleton', function () {
    $notifier1 = app(Notifier::class);
    $notifier2 = app(Notifier::class);

    expect($notifier1)->toBeInstanceOf(Notifier::class)
        ->and($notifier1)->toBe($notifier2);
});

it('binds WebhookInterface as singleton', function () {
    $webhook1 = app(WebhookInterface::class);
    $webhook2 = app(WebhookInterface::class);

    expect($webhook1)->toBeInstanceOf(Webhook::class)
        ->and($webhook1)->toBe($webhook2);
});

it('binds Client as singleton', function () {
    $client1 = app(Client::class);
    $client2 = app(Client::class);

    expect($client1)->toBeInstanceOf(Client::class)
        ->and($client1)->toBe($client2);
});

it('provides required services', function () {
    $provider = app()->getProvider(\CSlant\LaravelTelegramGitNotifier\Providers\TelegramGitNotifierServiceProvider::class);
    $provides = $provider->provides();

    expect($provides)->toContain(Telegram::class)
        ->toContain(Client::class)
        ->toContain(Bot::class)
        ->toContain(Notifier::class)
        ->toContain(WebhookInterface::class);
});

it('loads configuration', function () {
    expect(config('telegram-git-notifier.bot.token'))->toBe('test-bot-token')
        ->and(config('telegram-git-notifier.bot.chat_id'))->toBe('-123456789')
        ->and(config('telegram-git-notifier.app.url'))->toBe('https://example.com/telegram-git-notifier');
});

it('loads views with correct namespace', function () {
    expect(config('telegram-git-notifier.view.namespace'))->toBe('tg-notifier');
});
