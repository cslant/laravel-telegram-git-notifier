<?php

namespace CSlant\LaravelTelegramGitNotifier\Traits;

use Telegram;

trait Markup
{
    /**
     * Generate menu markup.
     *
     * @return array[]
     */
    public function menuMarkup(Telegram $telegram): array
    {
        return [
            [
                $telegram->buildInlineKeyBoardButton(__('tg-notifier::tools/menu.discussion'), config('telegram-git-notifier.author.discussion')),
            ], [
                $telegram->buildInlineKeyBoardButton(__('tg-notifier::tools/menu.source_code'), config('telegram-git-notifier.author.source_code')),
            ],
        ];
    }
}
