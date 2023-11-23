<?php

namespace CSlant\LaravelTelegramGitNotifier\Http\Actions;

use CSlant\LaravelTelegramGitNotifier\Services\NotificationService;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Exceptions\ConfigFileException;
use CSlant\TelegramGitNotifier\Exceptions\InvalidViewTemplateException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use CSlant\TelegramGitNotifier\Exceptions\SendNotificationException;
use CSlant\TelegramGitNotifier\Notifier;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Telegram;

class IndexAction
{
    protected Client $client;

    protected Bot $bot;

    protected Notifier $notifier;

    protected Request $request;

    /**
     * @throws ConfigFileException
     */
    public function __construct()
    {
        $this->client = new Client();

        $telegram = new Telegram(config('telegram-git-notifier.bot.token'));
        $this->bot = new Bot($telegram);
        $this->notifier = new Notifier();
    }

    /**
     * Handle telegram git notifier app.
     *
     * @return void
     *
     * @throws InvalidViewTemplateException
     * @throws MessageIsEmptyException
     * @throws SendNotificationException
     */
    public function __invoke(): void
    {
        $sendNotification = new NotificationService(
            $this->notifier,
            $this->bot->setting
        );
        $sendNotification->handle();
    }
}
