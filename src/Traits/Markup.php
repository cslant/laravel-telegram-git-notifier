<?php

declare(strict_types=1);

namespace CSlant\LaravelTelegramGitNotifier\Traits;

use Telegram as TelegramSDK;
use Illuminate\Support\Facades\Config;

/**
 * Trait Markup
 * 
 * Provides common markup generation methods for Telegram bot interfaces.
 */
trait Markup
{
    private const CONFIG_AUTHOR_DISCUSSION = 'telegram-git-notifier.author.discussion';
    private const CONFIG_AUTHOR_SOURCE_CODE = 'telegram-git-notifier.author.source_code';
    private const TRANSLATION_PREFIX = 'tg-notifier::tools/menu.';

    /**
     * Generate menu markup with discussion and source code buttons.
     *
     * @param TelegramSDK $telegram The Telegram SDK instance
     * @return array<array<array<string, string>>> The generated inline keyboard markup
     */
    public function menuMarkup(TelegramSDK $telegram): array
    {
        return [
            $this->createButtonRow(
                $telegram,
                '🗨 ' . $this->trans('discussion'),
                Config::get(self::CONFIG_AUTHOR_DISCUSSION, '#')
            ),
            $this->createButtonRow(
                $telegram,
                '💠 ' . $this->trans('source_code'),
                Config::get(self::CONFIG_AUTHOR_SOURCE_CODE, '#')
            ),
        ];
    }

    /**
     * Create a single button row for the inline keyboard.
     *
     * @param TelegramSDK $telegram The Telegram SDK instance
     * @param string $text The button text
     * @param string $url The URL to open when the button is pressed
     * @return array<array<string, string>> The button row
     */
    private function createButtonRow(TelegramSDK $telegram, string $text, string $url): array
    {
        return [$telegram->buildInlineKeyBoardButton($text, $url)];
    }

    /**
     * Get a translated string from the language file.
     *
     * @param string $key The translation key
     * @return string The translated string
     */
    private function trans(string $key): string
    {
        return __(self::TRANSLATION_PREFIX . $key);
    }
}
