<?php

declare(strict_types=1);

namespace CSlant\LaravelTelegramGitNotifier\Services;

use CSlant\LaravelTelegramGitNotifier\Traits\Markup;
use CSlant\TelegramGitNotifier\Bot;
use CSlant\TelegramGitNotifier\Constants\SettingConstant;
use CSlant\TelegramGitNotifier\Exceptions\BotException;
use CSlant\TelegramGitNotifier\Exceptions\CallbackException;
use CSlant\TelegramGitNotifier\Exceptions\InvalidViewTemplateException;
use CSlant\TelegramGitNotifier\Exceptions\MessageIsEmptyException;
use Illuminate\Support\Facades\Config;

class CallbackService
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
     * Answer the back button.
     *
     * @throws MessageIsEmptyException
     * @throws BotException
     * @throws CallbackException
     */
    public function answerBackButton(string $callback): void
    {
        $callback = str_replace(SettingConstant::SETTING_BACK, '', $callback);
        
        $result = match ($callback) {
            'settings' => $this->handleSettingsBack(),
            'settings.custom_events.github' => $this->handleGithubEventsBack(),
            'settings.custom_events.gitlab' => $this->handleGitlabEventsBack(),
            'menu' => $this->handleMenuBack(),
            default => null,
        };

        if ($result === null) {
            $this->bot->answerCallbackQuery(__('tg-notifier::app.unknown_callback'));
            return;
        }

        ['view' => $view, 'markup' => $markup] = $result;
        $this->bot->editMessageText($view, ['reply_markup' => $markup]);
    }
    
    /**
     * Handle settings back button.
     *
     * @return array{view: string, markup: mixed}
     */
    private function handleSettingsBack(): array
    {
        return [
            'view' => view("$this->viewNamespace::tools.settings"),
            'markup' => $this->bot->settingMarkup(),
        ];
    }
    
    /**
     * Handle GitHub events back button.
     *
     * @return array{view: string, markup: mixed}
     */
    private function handleGithubEventsBack(): array
    {
        return [
            'view' => view("$this->viewNamespace::tools.custom_event", ['platform' => 'github']),
            'markup' => $this->bot->eventMarkup(),
        ];
    }
    
    /**
     * Handle GitLab events back button.
     *
     * @return array{view: string, markup: mixed}
     */
    private function handleGitlabEventsBack(): array
    {
        return [
            'view' => view("$this->viewNamespace::tools.custom_event", ['platform' => 'gitlab']),
            'markup' => $this->bot->eventMarkup(null, 'gitlab'),
        ];
    }
    
    /**
     * Handle menu back button.
     *
     * @return array{view: string, markup: mixed}
     */
    private function handleMenuBack(): array
    {
        return [
            'view' => view("$this->viewNamespace::tools.menu"),
            'markup' => $this->menuMarkup($this->bot->telegram),
        ];
    }

    /**
     * Handle the callback action.
     *
     * @throws MessageIsEmptyException
     * @throws InvalidViewTemplateException
     * @throws BotException
     * @throws CallbackException
     */
    public function handle(): void
    {
        $callback = (string) $this->bot->telegram->Callback_Data();

        if ($this->handleCustomEvents($callback) || $this->handleBackButton($callback)) {
            return;
        }

        $this->handleSettingUpdate($callback);
    }

    /**
     * Handle custom events callback.
     */
    private function handleCustomEvents(string $callback): bool
    {
        if (!str_contains($callback, SettingConstant::SETTING_CUSTOM_EVENTS)) {
            return false;
        }

        $this->bot->eventHandle($callback);
        return true;
    }

    /**
     * Handle back button callback.
     */
    private function handleBackButton(string $callback): bool
    {
        if (!str_contains($callback, SettingConstant::SETTING_BACK)) {
            return false;
        }

        $this->answerBackButton($callback);
        return true;
    }

    /**
     * Handle setting update callback.
     */
    private function handleSettingUpdate(string $callback): void
    {
        $settingKey = str_replace(SettingConstant::SETTING_PREFIX, '', $callback);
        $settings = $this->bot->setting->getSettings();

        if (!array_key_exists($settingKey, $settings)) {
            return;
        }

        $newValue = !$settings[$settingKey];
        $success = $this->bot->setting->updateSetting($settingKey, $newValue);

        if ($success) {
            $this->updateMessageMarkup();
        } else {
            $this->sendUnknownCallbackError();
        }
    }

    /**
     * Update the message markup with the latest settings.
     */
    private function updateMessageMarkup(): void
    {
        $this->bot->editMessageReplyMarkup([
            'reply_markup' => $this->bot->settingMarkup(),
        ]);
    }

    /**
     * Send an unknown callback error to the user.
     */
    private function sendUnknownCallbackError(): void
    {
        $this->bot->answerCallbackQuery(__('tg-notifier::app.unknown_callback'));
    }
}
