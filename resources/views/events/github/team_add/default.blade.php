<?php

/**
 * @var object $payload
 */

?>

⚡ <b>{!! __('tg-notifier::events/github/team_add.title') !!}</b> 🎊

@if(isset($payload->organization))
🏢 {!! __('tg-notifier::events/github/team_add.organization') !!}: <b>{{ $payload->organization->login }}</b>
@endif
@if(isset($payload->repository))
📦 {!! __('tg-notifier::events/github/team_add.full_name') !!}: 🦑<a href='{{ $payload->team->html_url }}'><b>{{ $payload->repository->full_name }}</b></a>
@endif
@if(isset($payload->team))
👥 {!! __('tg-notifier::events/github/team_add.team') !!}: <code>{{ $payload->team->name }}</code>
@endif
