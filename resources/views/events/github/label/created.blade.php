<?php
/**
 * @var $payload object
 */

$label = $payload->label;
$description = strlen($label->description) > 50 ? $label->description : substr($label->description, 0, 50).'...';
?>

💬 {!! __('tg-notifier::events/github/label.created.title', [
            'repo' => "⚠️ - 🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>",
        ]
    ) !!}

📢 <b>{{ $payload->label->name }}</b>
<pre>{{ $description }}</pre>
