<?php

declare(strict_types=1);

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\LaravelTelegramGitNotifier\Traits\Markup;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Exceptions\EntryNotFoundException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use Illuminate\Support\Facades\Config;

class CommandService
{
    use Markup;

    private const CONFIG_VIEW_NAMESPACE = 'telegram-git-notifier.view.namespace';

    public function __construct(
        private Bot $bot,
        private string $viewNamespace
    ) {
    }

    public static function create(Bot $bot): self
    {
        return new self(
            $bot,
            (string) Config::get(self::CONFIG_VIEW_NAMESPACE, '')
        );
    }

    /**
     * Send the start message to the user.
     *
     * @throws EntryNotFoundException
     */
    private function sendStartMessage(): void
    {
        $firstName = $this->bot->telegram->FirstName() ?: 'there';
        $reply = view("$this->viewNamespace::tools.start", ['first_name' => $firstName]);
        $imagePath = __DIR__.'/../../resources/images/telegram-git-notifier-laravel.png';

        $this->bot->sendPhoto($imagePath, ['caption' => $reply]);
    }

    /**
     * Handle the incoming command.
     *
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    public function handle(): void
    {
        $text = (string) $this->bot->telegram->Text();
        $command = trim($text, '/');

        $handlers = [
            'start' => fn () => $this->handleStart(),
            'menu' => fn () => $this->handleMenu(),
            'settings' => fn () => $this->handleSettings(),
            'set_menu' => fn () => $this->handleSetMenu(),
            'default' => fn () => $this->handleDefault($command),
        ];

        $handler = $handlers[$command] ?? $this->handleToolCommand($command) ?? $handlers['default'];
        $handler();
    }

    /**
     * Handle the start command.
     *
     * @throws EntryNotFoundException
     */
    private function handleStart(): void
    {
        $this->sendStartMessage();
    }

    /**
     * Handle the menu command.
     *
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    private function handleMenu(): void
    {
        $this->bot->sendMessage(
            view("$this->viewNamespace::tools.menu"),
            ['reply_markup' => $this->menuMarkup($this->bot->telegram)]
        );
    }

    /**
     * Handle the settings command.
     */
    private function handleSettings(): void
    {
        $this->bot->settingHandle();
    }

    /**
     * Handle the set_menu command.
     *
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    private function handleSetMenu(): void
    {
        $this->bot->setMyCommands(self::menuCommands());
    }

    /**
     * Handle tool commands (token, id, usage, server).
     *
     * @return callable|null The handler function or null if not a tool command
     */
    private function handleToolCommand(string $command): ?callable
    {
        $toolCommands = ['token', 'id', 'usage', 'server'];

        if (!in_array($command, $toolCommands, true)) {
            return null;
        }

        return function () use ($command): void {
            $this->bot->sendMessage(view("$this->viewNamespace::tools.{$command}"));
        };
    }

    /**
     * Handle unknown commands.
     *
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    private function handleDefault(string $command): void
    {
        $this->bot->sendMessage('🤨 '.__('tg-notifier::app.invalid_request'));
    }

    /**
     * Get the list of available menu commands.
     *
     * @return array<array{command: string, description: string}>
     */
    public static function menuCommands(): array
    {
        return [
            self::createCommand('start', 'start'),
            self::createCommand('menu', 'menu'),
            self::createCommand('token', 'token'),
            self::createCommand('id', 'id'),
            self::createCommand('usage', 'usage'),
            self::createCommand('server', 'server'),
            self::createCommand('settings', 'settings'),
        ];
    }

    /**
     * Create a command array with the given name and translation key.
     *
     * @param string $name The command name without the leading slash
     * @param string $translationKey The translation key suffix
     * @return array{command: string, description: string}
     */
    private static function createCommand(string $name, string $translationKey): array
    {
        return [
            'command' => "/$name",
            'description' => __("tg-notifier::tools/menu.$translationKey"),
        ];
    }
}
