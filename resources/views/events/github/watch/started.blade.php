<?php
/**
 * @var $payload object
 */
?>

🎉 {!! __('tg-notifier::events/github/watch.started.title', [
    'repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"
        ]
    ) !!}

👤 {!! __('tg-notifier::events/github/watch.started.watcher') !!}: <code>{{ $payload->sender->login }}</code> 👀
