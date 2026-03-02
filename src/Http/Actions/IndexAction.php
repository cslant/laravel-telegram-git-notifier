<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

use CSlant\LaravelTelegramGitNotifier\Services\CallbackService;
use CSlant\LaravelTelegramGitNotifier\Services\CommandService;
use CSlant\LaravelTelegramGitNotifier\Services\NotificationService;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Exceptions\BotException;
use CSlant\TelegramGitNotifier\Exceptions\CallbackException;
use CSlant\TelegramGitNotifier\Exceptions\ConfigFileException;
use CSlant\TelegramGitNotifier\Exceptions\EntryNotFoundException;
use CSlant\TelegramGitNotifier\Exceptions\InvalidViewTemplateException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use CSlant\TelegramGitNotifier\Exceptions\SendNotificationException;
use CSlant\TelegramGitNotifier\Notifier;
use Telegram;

class IndexAction
{
    protected readonly Bot $bot;

    protected readonly Notifier $notifier;

    /**
     * @throws ConfigFileException
     */
    public function __construct(
        ?Bot $bot = null,
        ?Notifier $notifier = null,
    ) {
        $telegram = new Telegram(config('telegram-git-notifier.bot.token'));
        $this->bot = $bot ?? new Bot($telegram);
        $this->notifier = $notifier ?? new Notifier();
    }

    /**
     * Handle telegram git notifier app.
     *
     * @throws InvalidViewTemplateException
     * @throws MessageIsEmptyException
     * @throws SendNotificationException
     * @throws BotException
     * @throws CallbackException
     * @throws EntryNotFoundException
     */
    public function __invoke(): void
    {
        if ($this->bot->isCallback()) {
            (new CallbackService($this->bot))->handle();

            return;
        }

        if ($this->bot->isMessage() && $this->bot->isOwner()) {
            (new CommandService($this->bot))->handle();

            return;
        }

        (new NotificationService(
            $this->notifier,
            $this->bot->setting,
        ))->handle();
    }
}
