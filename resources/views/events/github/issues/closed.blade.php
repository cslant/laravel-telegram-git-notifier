<?php
/**
 * @var $payload mixed
 * @var $event string
 */

$issue = $payload->issue;
?>

{!! __('tg-notifier::events/github/issues.closed.title', [
            'issue' => "<a href='$issue->html_url'>{$payload->repository->full_name}#$issue->number</a>",
            'user' => "<a href='{$issue->user->html_url}'>@{$issue->user->login}</a>"
        ]
    ) !!}

📢 <b>{{ $issue->title }}</b>

@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))
@include('tg-notifier::events.shared.partials.github._body', compact('payload', 'event'))
