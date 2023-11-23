<?php

use CSlant\LaravelTelegramGitNotifier\Http\Actions\IndexAction;
use CSlant\LaravelTelegramGitNotifier\Http\Actions\WebhookAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Bot Routes
|--------------------------------------------------------------------------
|
| Here is where you can register bot routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "bot" middleware group. Make something great!
|
*/

$routePrefix = config('telegram-git-notifier.defaults.route_prefix');

Route::prefix($routePrefix)->group(function () use ($routePrefix) {
    Route::match(['get', 'post'], '/', IndexAction::class)->name("$routePrefix.index");

    Route::prefix('webhook')->group(function () use ($routePrefix) {
        Route::get('set', [WebhookAction::class, 'set'])->name("$routePrefix.webhook.set");
        Route::get('delete', [WebhookAction::class, 'delete'])->name("$routePrefix.webhook.delete");
        Route::get('info', [WebhookAction::class, 'getWebHookInfo'])->name("$routePrefix.webhook.info");
        Route::get('updates', [WebhookAction::class, 'getUpdates'])->name("$routePrefix.webhook.updates");
    });
});
