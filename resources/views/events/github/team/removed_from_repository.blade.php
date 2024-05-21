<?php

/**
 * @var object $payload
 */

?>

⚡ <b>{!! __('tg-notifier::events/github/team.removed_from_repository.title') !!}</b> 🎊

@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/team.removed_from_repository.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->repository))
📦 {!! __('tg-notifier::events/github/team.removed_from_repository.full_name') !!}: 🦑<a href='{{ $payload->team->html_url }}'><b>{{ $payload->repository->full_name }}</b></a>
@endif
@if(isset($payload->sender))
👤 {!! __('tg-notifier::events/github/team.removed_from_repository.sender') !!}: <b>{{ $payload->sender->login }}</b>
@endif
@if(isset($payload->team))
👥 {!! __('tg-notifier::events/github/team.removed_from_repository.team') !!}: <a href='{{ $payload->team->html_url }}'><b>{{ $payload->team->name }}</b></a>
@endif
