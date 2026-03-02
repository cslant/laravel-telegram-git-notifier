<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\LaravelTelegramGitNotifier\Traits\Markup;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Exceptions\EntryNotFoundException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;

class CommandService
{
    use Markup;

    private readonly Bot $bot;

    protected readonly string $viewNamespace;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
        /** @var string $viewNamespace */
        $viewNamespace = config('telegram-git-notifier.view.namespace');
        $this->viewNamespace = $viewNamespace;
    }

    /**
     * @throws EntryNotFoundException
     */
    public function sendStartMessage(Bot $bot): void
    {
        $reply = view(
            "$this->viewNamespace::tools.start",
            ['first_name' => $bot->telegram->FirstName()]
        );
        $bot->sendPhoto(
            __DIR__.'/../../resources/images/telegram-git-notifier-laravel.png',
            ['caption' => $reply]
        );
    }

    /**
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    public function handle(): void
    {
        $text = $this->bot->telegram->Text();

        match ($text) {
            '/start' => $this->sendStartMessage($this->bot),
            '/menu' => $this->bot->sendMessage(
                view("$this->viewNamespace::tools.menu"),
                ['reply_markup' => $this->menuMarkup($this->bot->telegram)]
            ),
            '/token', '/id', '/usage', '/server' => $this->bot->sendMessage(
                view("$this->viewNamespace::tools.".trim($text, '/'))
            ),
            '/settings' => $this->bot->settingHandle(),
            '/set_menu' => $this->bot->setMyCommands(self::menuCommands()),
            default => $this->bot->sendMessage(
                '🤨 '.__('tg-notifier::app.invalid_request')
            ),
        };
    }

    /**
     * @return array<array{command: string, description: string}>
     */
    public static function menuCommands(): array
    {
        return [
            ['command' => '/start', 'description' => __('tg-notifier::tools/menu.start')],
            ['command' => '/menu', 'description' => __('tg-notifier::tools/menu.menu')],
            ['command' => '/token', 'description' => __('tg-notifier::tools/menu.token')],
            ['command' => '/id', 'description' => __('tg-notifier::tools/menu.id')],
            ['command' => '/usage', 'description' => __('tg-notifier::tools/menu.usage')],
            ['command' => '/server', 'description' => __('tg-notifier::tools/menu.server')],
            ['command' => '/settings', 'description' => __('tg-notifier::tools/menu.settings')],
            ['command' => '/set_menu', 'description' => __('tg-notifier::tools/menu.set_menu')],
        ];
    }
}
