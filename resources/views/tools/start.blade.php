<?php
/**
 * @var string $first_name
 */

?>
{!! __('tg-notifier::tools/start.title', ['appName' => config('telegram-git-notifier.app.name')]) !!}

{!! __('tg-notifier::tools/start.firstName', ['firstName' => $first_name]) !!}

{!! __('tg-notifier::tools/start.notification') !!}
