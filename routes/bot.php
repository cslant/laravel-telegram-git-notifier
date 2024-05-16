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

Route::prefix($routePrefix)->name("$routePrefix.")->group(function () {
    Route::match(['get', 'post'], '/', IndexAction::class)->name('index');

    Route::prefix('webhook')->name('webhook.')->group(function () {
        Route::get('set', [WebhookAction::class, 'set'])->name('set');
        Route::get('delete', [WebhookAction::class, 'delete'])->name('delete');
        Route::get('info', [WebhookAction::class, 'getWebHookInfo'])->name('info');
        Route::get('updates', [WebhookAction::class, 'getUpdates'])->name('updates');
    });
});
