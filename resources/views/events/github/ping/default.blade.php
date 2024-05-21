<?php

/**
 * @var object $payload
 */

?>

⚡ <b>{!! __('tg-notifier::events/github/ping.title') !!}</b> 🎊

@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/ping.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->repository))
📦 {!! __('tg-notifier::events/github/ping.full_name') !!}: 🦑<b>{{ $payload->repository->full_name }}</b>
@endif
@if(isset($payload->sender))
👤 {!! __('tg-notifier::events/github/ping.sender') !!}: <code>{{ $payload->sender->login }}</code>
@endif
