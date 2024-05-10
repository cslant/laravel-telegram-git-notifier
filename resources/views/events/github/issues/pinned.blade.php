<?php
/**
 * @var $payload object
 * @var $event string
 */

$issue = $payload->issue;
?>

📌 {!! __('tg-notifier::events/github/issues.pinned.title', [
            'issue' => "🦑 <a href='$issue->html_url'>{$payload->repository->full_name}#$issue->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

📢 {!! __('tg-notifier::events/github/issues.issue_title') !!}: <code>{{ $issue->title }}</code>

@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))
