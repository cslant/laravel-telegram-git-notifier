<?php

use CSlant\LaravelTelegramGitNotifier\Services\WebhookService;
use CSlant\TelegramGitNotifier\Exceptions\WebhookException;
use CSlant\TelegramGitNotifier\Interfaces\WebhookInterface;

it('can be instantiated with webhook interface', function () {
    $mockWebhook = Mockery::mock(WebhookInterface::class);
    $mockWebhook->shouldReceive('setToken')->once()->with('test-bot-token');
    $mockWebhook->shouldReceive('setUrl')->once()->with('https://example.com/telegram-git-notifier');

    $service = new WebhookService($mockWebhook);

    expect($service)->toBeInstanceOf(WebhookService::class);
});

it('calls setWebhook on the webhook instance', function () {
    $mockWebhook = Mockery::mock(WebhookInterface::class);
    $mockWebhook->shouldReceive('setToken')->once();
    $mockWebhook->shouldReceive('setUrl')->once();
    $mockWebhook->shouldReceive('setWebhook')->once()->andReturn('{"ok":true}');

    $service = new WebhookService($mockWebhook);
    $result = $service->setWebhook();

    expect($result)->toBe('{"ok":true}');
});

it('calls deleteWebHook on the webhook instance', function () {
    $mockWebhook = Mockery::mock(WebhookInterface::class);
    $mockWebhook->shouldReceive('setToken')->once();
    $mockWebhook->shouldReceive('setUrl')->once();
    $mockWebhook->shouldReceive('deleteWebHook')->once()->andReturn('{"ok":true}');

    $service = new WebhookService($mockWebhook);
    $result = $service->deleteWebHook();

    expect($result)->toBe('{"ok":true}');
});

it('calls getUpdates on the webhook instance', function () {
    $mockWebhook = Mockery::mock(WebhookInterface::class);
    $mockWebhook->shouldReceive('setToken')->once();
    $mockWebhook->shouldReceive('setUrl')->once();
    $mockWebhook->shouldReceive('getUpdates')->once()->andReturn('{"ok":true,"result":[]}');

    $service = new WebhookService($mockWebhook);
    $result = $service->getUpdates();

    expect($result)->toBe('{"ok":true,"result":[]}');
});

it('calls getWebHookInfo on the webhook instance', function () {
    $mockWebhook = Mockery::mock(WebhookInterface::class);
    $mockWebhook->shouldReceive('setToken')->once();
    $mockWebhook->shouldReceive('setUrl')->once();
    $mockWebhook->shouldReceive('getWebHookInfo')->once()->andReturn('{"ok":true,"result":{"url":"https://example.com"}}');

    $service = new WebhookService($mockWebhook);
    $result = $service->getWebHookInfo();

    expect($result)->toBe('{"ok":true,"result":{"url":"https://example.com"}}');
});

it('propagates webhook exceptions', function () {
    $mockWebhook = Mockery::mock(WebhookInterface::class);
    $mockWebhook->shouldReceive('setToken')->once();
    $mockWebhook->shouldReceive('setUrl')->once();
    $mockWebhook->shouldReceive('setWebhook')->once()->andThrow(new WebhookException('Failed to set webhook'));

    $service = new WebhookService($mockWebhook);
    $service->setWebhook();
})->throws(WebhookException::class, 'Failed to set webhook');
