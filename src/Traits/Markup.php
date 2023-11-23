<?php

namespace CSlant\LaravelTelegramGitNotifier\Traits;

use Telegram;

trait Markup
{
    /**
     * Generate menu markup
     *
     * @return array[]
     */
    public function menuMarkup(Telegram $telegram): array
    {
        return [
            [
                $telegram->buildInlineKeyBoardButton('🗨 Discussion', config('telegram-git-notifier.author.discussion')),
            ], [
                $telegram->buildInlineKeyBoardButton('💠 Source Code', config('telegram-git-notifier.author.source_code')),
            ],
        ];
    }
}
