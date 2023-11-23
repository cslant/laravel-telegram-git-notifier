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

Route::prefix('telegram-git-notifier')->group(function () {
    Route::any('/', [IndexAction::class, 'index'])->name('telegram-git-notifier.index');

    Route::prefix('webhook')->group(function () {
        Route::get('/set', [WebhookAction::class, 'set'])->name('telegram-git-notifier.webhook.set');
        Route::get('/delete', [WebhookAction::class, 'delete'])->name('telegram-git-notifier.webhook.delete');
        Route::get('/info', [WebhookAction::class, 'getWebHookInfo'])->name('telegram-git-notifier.webhook.info');
        Route::get('/updates', [WebhookAction::class, 'getUpdates'])->name('telegram-git-notifier.webhook.updates');
    });
});
