<?php
/**
 * @var $payload object
 */

?>

🗑 {!! __('tg-notifier::events/github/label.deleted.title', [
            'repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>",
        ]
    ) !!}

📢 <b>{{ $payload->label->name }}</b>
