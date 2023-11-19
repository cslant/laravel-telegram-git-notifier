<?php
/**
 * @var $payload mixed
 */
?>

{!! __('tg-notifier::events/github/watch.started.title', [
    'user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"
        ]
    ) !!}

{!! __('tg-notifier::events/github/watch.started.watched', ['sender_login' => $payload->sender->login]) !!}
