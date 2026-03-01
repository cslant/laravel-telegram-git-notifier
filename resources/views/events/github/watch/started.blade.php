<?php
/**
 * @var object $payload
 */

?>

👀 {!! __('tg-notifier::events/github/watch.started.title', [
    'repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"
        ]
    ) !!}
━━━━━━━━━━━━━━━━━━━━
👤 {!! __('tg-notifier::events/github/watch.started.watcher') !!}: <a href="{{ $payload->sender->html_url }}">@{{ $payload->sender->login }}</a>
