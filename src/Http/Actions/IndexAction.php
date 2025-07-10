<?php

declare(strict_types=1);

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
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Telegram\Telegram as TelegramSDK;

class IndexAction
{
    public function __construct(
        private ClientInterface $client,
        private Bot $bot,
        private Notifier $notifier,
        private Request $request
    ) {
    }

    /**
     * Create a new instance with default dependencies.
     *
     * @throws ConfigFileException
     */
    public static function createDefault(): self
    {
        return new self(
            new Client(),
            new Bot(new TelegramSDK(config('telegram-git-notifier.bot.token'))),
            new Notifier(),
            Request::createFromGlobals()
        );
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
            $this->handleCallback();

            return;
        }

        if ($this->shouldHandleCommand()) {
            $this->handleCommand();

            return;
        }

        $this->handleNotification();
    }

    /**
     * Handle callback actions.
     *
     * @throws CallbackException
     * @throws EntryNotFoundException
     * @throws InvalidViewTemplateException
     * @throws MessageIsEmptyException
     */
    private function handleCallback(): void
    {
        $callbackAction = new CallbackService($this->bot);
        $callbackAction->handle();
    }

    /**
     * Handle command messages.
     *
     * @throws EntryNotFoundException
     * @throws MessageIsEmptyException
     */
    private function handleCommand(): void
    {
        if (!$this->bot->isMessage() || !$this->bot->isOwner()) {
            return;
        }

        $commandAction = new CommandService($this->bot);
        $commandAction->handle();
    }

    /**
     * Handle notification sending.
     *
     * @throws InvalidViewTemplateException
     * @throws MessageIsEmptyException
     * @throws SendNotificationException
     */
    private function handleNotification(): void
    {
        $notificationService = new NotificationService(
            $this->notifier,
            $this->bot->setting
        );
        $notificationService->handle();
    }

    /**
     * Check if the current message should be handled as a command.
     */
    private function shouldHandleCommand(): bool
    {
        return $this->bot->isMessage() && $this->bot->isOwner();
    }
}
