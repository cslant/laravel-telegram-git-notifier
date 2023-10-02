<?php

use Illuminate\Support\Facades\Route;
use LbilTech\LaravelTelegramGitNotifier\Http\Actions\WebhookAction;

/*
|--------------------------------------------------------------------------
| Bot Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('telegram-git-notifier')->group(function () {
    Route::get('/set-webhook', [WebhookAction::class, 'set'])->name('set-webhook');
    Route::get('/delete-webhook', [WebhookAction::class, 'delete'])->name('delete-webhook');
});
