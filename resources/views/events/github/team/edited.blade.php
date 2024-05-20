<?php

/**
 * @var $payload object
 */

?>

⚡ <b>{!! __('tg-notifier::events/github/team.edited.title') !!}</b> 🎊

@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/team.edited.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->sender))
👤 {!! __('tg-notifier::events/github/team.edited.sender') !!}: <b>{{ $payload->sender->login }}</b>
@endif
@if(isset($payload->team))
👥 {!! __('tg-notifier::events/github/team.edited.team') !!}: <a href='{{ $payload->team->html_url }}'><b>{{ $payload->team->name }}</b></a>
@endif