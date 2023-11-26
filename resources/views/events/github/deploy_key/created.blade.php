<?php
/**
 * @var $payload object
 */
?>

{!! __('tg-notifier::events/github/deploy_key.created.title', [
    'issue' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
    'user' => "<b>{$payload->key->added_by}</b>",
        ]
    ) !!}

📢 <b>{{ $payload->key->title }}</b>
{!! __('tg-notifier::events/github/deploy_key.created.message') !!}
