<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Exceptions\EntryNotFoundException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use CSlant\LaravelTelegramGitNotifier\Traits\Markup;

class CommandService
{
    use Markup;

    public const MENU_COMMANDS
        = [
            [
                'command' => '/start',
                'description' => 'Welcome to the bot',
            ], [
                'command' => '/menu',
                'description' => 'Show menu of the bot',
            ], [
                'command' => '/token',
                'description' => 'Show token of the bot',
            ], [
                'command' => '/id',
                'description' => 'Show the ID of the current chat',
            ], [
                'command' => '/usage',
                'description' => 'Show step by step usage',
            ], [
                'command' => '/server',
                'description' => 'To get Server Information',
            ], [
                'command' => '/settings',
                'description' => 'Go to settings of the bot',
            ],
        ];

    private Bot $bot;

    protected string $viewNamespace = '';

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
        $this->viewNamespace = config('telegram-git-notifier.view.namespace');
    }

    /**
     * @param Bot $bot
     *
     * @return void
     * @throws EntryNotFoundException
     */
    public function sendStartMessage(Bot $bot): void
    {
        $reply = view(
            "$this->viewNamespace::tools.start",
            ['first_name' => $bot->telegram->FirstName()]
        );
        $bot->sendPhoto(
            __DIR__ . '/../../resources/images/start.png',
            ['caption' => $reply]
        );
    }

    /**
     * @return void
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    public function handle(): void
    {
        $text = $this->bot->telegram->Text();

        switch ($text) {
            case '/start':
                $this->sendStartMessage($this->bot);

                break;
            case '/menu':
                $this->bot->sendMessage(
                    view("$this->viewNamespace::tools.menu"),
                    ['reply_markup' => $this->menuMarkup($this->bot->telegram)]
                );

                break;
            case '/token':
            case '/id':
            case '/usage':
            case '/server':
                $this->bot->sendMessage(view('tools.' . trim($text, '/')));

                break;
            case '/settings':
                $this->bot->settingHandle();

                break;
            case '/set_menu':
                $this->bot->setMyCommands(CommandService::MENU_COMMANDS);

                break;
            default:
                $this->bot->sendMessage('🤨 Invalid Request!');
        }
    }
}
