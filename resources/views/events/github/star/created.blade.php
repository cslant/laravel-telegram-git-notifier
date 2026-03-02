<?php
/**
 * @var object $payload
 */

?>

⭐ {!! __('tg-notifier::events/github/star.created.title') !!} <a href='{{ $payload->repository->html_url }}'>{{ $payload->repository->full_name }}</a>
━━━━━━━━━━━━━━━━━━━━
👤 {!! __('tg-notifier::events/github/star.created.seeder') !!}: <a href="{{ $payload->sender->html_url }}">@{{ $payload->sender->login }}</a>
