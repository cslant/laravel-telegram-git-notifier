<?php
/**
 * @var $payload object
 */
?>

{!! __('tg-notifier::events/github/star.deleted.title', [
    'user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"
        ]
    ) !!}

{!! __('tg-notifier::events/github/star.deleted.remover', ['sender_login' => $payload->sender->login]) !!}
