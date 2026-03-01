<?php

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\LaravelTelegramGitNotifier\Traits\Markup;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Constants\SettingConstant;
use CSlant\TelegramGitNotifier\Exceptions\BotException;
use CSlant\TelegramGitNotifier\Exceptions\CallbackException;
use CSlant\TelegramGitNotifier\Exceptions\InvalidViewTemplateException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;

class CallbackService
{
    use Markup;

    private readonly Bot $bot;

    protected readonly string $viewNamespace;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
        $this->viewNamespace = config('telegram-git-notifier.view.namespace');
    }

    /**
     * Answer the back button.
     *
     * @throws MessageIsEmptyException
     * @throws BotException
     * @throws CallbackException
     */
    public function answerBackButton(string $callback): void
    {
        $callback = str_replace(SettingConstant::SETTING_BACK, '', $callback);

        [$view, $markup] = match ($callback) {
            'settings' => [
                view("$this->viewNamespace::tools.settings"),
                $this->bot->settingMarkup(),
            ],
            'settings.custom_events.github' => [
                view("$this->viewNamespace::tools.custom_event", ['platform' => 'github']),
                $this->bot->eventMarkup(),
            ],
            'settings.custom_events.gitlab' => [
                view("$this->viewNamespace::tools.custom_event", ['platform' => 'gitlab']),
                $this->bot->eventMarkup(null, 'gitlab'),
            ],
            'menu' => [
                view("$this->viewNamespace::tools.menu"),
                $this->menuMarkup($this->bot->telegram),
            ],
            default => [null, null],
        };

        if ($view === null) {
            $this->bot->answerCallbackQuery(__('tg-notifier::app.unknown_callback'));

            return;
        }

        $this->bot->editMessageText($view, [
            'reply_markup' => $markup,
        ]);
    }

    /**
     * @throws MessageIsEmptyException
     * @throws InvalidViewTemplateException
     * @throws BotException|CallbackException
     */
    public function handle(): void
    {
        $callback = $this->bot->telegram->Callback_Data();

        if (str_contains($callback, SettingConstant::SETTING_CUSTOM_EVENTS)) {
            $this->bot->eventHandle($callback);

            return;
        }

        if (str_contains($callback, SettingConstant::SETTING_BACK)) {
            $this->answerBackButton($callback);

            return;
        }

        $callback = str_replace(SettingConstant::SETTING_PREFIX, '', $callback);

        $settings = $this->bot->setting->getSettings();
        if (array_key_exists($callback, $settings)
            && $this->bot->setting->updateSetting(
                $callback,
                !$settings[$callback]
            )
        ) {
            $this->bot->editMessageReplyMarkup([
                'reply_markup' => $this->bot->settingMarkup(),
            ]);
        } else {
            $this->bot->answerCallbackQuery(__('tg-notifier::app.unknown_callback'));
        }
    }
}
