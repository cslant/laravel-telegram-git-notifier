<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhookSecret
{
    /**
     * Verify the webhook secret token from Telegram.
     *
     * When setting a webhook, you can optionally provide a secret_token.
     * Telegram will send it in the X-Telegram-Bot-Api-Secret-Token header.
     *
     * @see https://core.telegram.org/bots/api#setwebhook
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var string $secret */
        $secret = config('telegram-git-notifier.bot.webhook_secret', '');

        if ($secret === '') {
            return $next($request);
        }

        $headerSecret = $request->header('X-Telegram-Bot-Api-Secret-Token');

        if (!hash_equals($secret, (string) $headerSecret)) {
            abort(403, 'Invalid webhook secret');
        }

        return $next($request);
    }
}
