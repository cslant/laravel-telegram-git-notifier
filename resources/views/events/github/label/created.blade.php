<?php
/**
 * @var object $payload
 */

$label = $payload->label;
?>

🏷 {!! __('tg-notifier::events/github/label.created.title', [
            'repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>",
        ]
    ) !!}
━━━━━━━━━━━━━━━━━━━━
🔖 <b>{{ $payload->label->name }}</b>
<b>{!! __('tg-notifier::events/shared/github._description.title') !!}:</b> {{ \Illuminate\Support\Str::limit($label->description) }}
