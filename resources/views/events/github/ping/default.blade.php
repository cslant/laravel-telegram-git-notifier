<?php
/**
 * @var $payload object
 */
?>

⚡ <b>{!! __('tg-notifier::events/github/ping.default.title') !!}</b>

@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/ping.default.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->repository))
📦 {!! __('tg-notifier::events/github/ping.default.full_name') !!}: 🦑<b>{{ $payload->repository->full_name }}</b>
@endif
@if(isset($payload->sender))
👤 {!! __('tg-notifier::events/github/ping.default.sender') !!}: <code>{{ $payload->sender->login }}</code>
@endif
