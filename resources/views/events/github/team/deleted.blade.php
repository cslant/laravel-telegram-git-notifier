<?php

/**
 * @var $payload object
 */

?>

🗑 <b>{!! __('tg-notifier::events/github/team.deleted.title') !!}</b> 🎊

@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/team.deleted.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->sender))
👤 {!! __('tg-notifier::events/github/team.deleted.sender') !!}: <b>{{ $payload->sender->login }}</b>
@endif
@if(isset($payload->team))
👥 {!! __('tg-notifier::events/github/team.deleted.team') !!}: <b>{{ $payload->team->name }}</b>
@endif