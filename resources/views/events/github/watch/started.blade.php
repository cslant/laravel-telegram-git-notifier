<?php
/**
 * @var $payload object
 */
?>

{!! __('tg-notifier::events/github/watch.started.title', [
    'user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"
        ]
    ) !!}

{!! __('tg-notifier::events/github/watch.started.watcher', ['sender_login' => $payload->sender->login]) !!}
