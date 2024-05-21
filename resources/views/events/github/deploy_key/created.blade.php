<?php
/**
 * @var object $payload
 */

?>

💬 {!! __('tg-notifier::events/github/deploy_key.created.title', [
        'repo' => "🦑 <a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
        'user' => "<b>{$payload->key->added_by}</b>",
    ]
) !!}

📢 {!! __('tg-notifier::events/github/deploy_key.key_title') !!}: <code>{{ $payload->key->title }}</code>
{!! __('tg-notifier::events/github/deploy_key.created.message') !!}
