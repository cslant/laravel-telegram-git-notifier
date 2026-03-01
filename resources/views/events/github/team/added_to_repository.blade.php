<?php

/**
 * @var object $payload
 */

?>

👥 <b>{!! __('tg-notifier::events/github/team.added_to_repository.title') !!}</b>
━━━━━━━━━━━━━━━━━━━━
@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/team.added_to_repository.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->repository))
📦 {!! __('tg-notifier::events/github/team.added_to_repository.full_name') !!}: <a href='{{ $payload->repository->html_url }}'><b>{{ $payload->repository->full_name }}</b></a>
📄 {!! __('tg-notifier::events/github/team.added_to_repository.role_name') !!}: <b>{{ $payload->repository->role_name }}</b>
@endif
@if(isset($payload->sender))
👤 {!! __('tg-notifier::events/github/team.added_to_repository.sender') !!}: <b>{{ $payload->sender->login }}</b>
@endif
@if(isset($payload->team))
👥 {!! __('tg-notifier::events/github/team.added_to_repository.team') !!}: <a href='{{ $payload->team->html_url }}'><b>{{ $payload->team->name }}</b></a>
@endif
