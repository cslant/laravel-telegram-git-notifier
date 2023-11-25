<?php
/**
 * @var $chatId string
 */

?>
{!! __('tg-notifier::globals/access_denied.title') !!}

@if(!empty($chatId))
{!! __('tg-notifier::globals/access_denied.chat_id', ['chatId' => $chatId]) !!}
@endif
{!! __('tg-notifier::globals/access_denied.message') !!}
