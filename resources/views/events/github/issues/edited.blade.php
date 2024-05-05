<?php
/**
 * @var $payload object
 * @var $event string
 */

$issue = $payload->issue;
?>

⚠️ {!! __('tg-notifier::events/github/issues.edited.title', [
            'issue' => "🦑 <a href='$issue->html_url'>{$payload->repository->full_name}#$issue->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

📢 {!! __('tg-notifier::events/github/issues.issue_title') !!}: <b>{{ $issue->title }}</b>

@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))
@if(isset($payload->changes->title))
📖 {!! __('tg-notifier::events/github/issues.edited.changes.title.name') !!}
    📝 {!! __('tg-notifier::events/github/issues.edited.changes.title.from', ['title_from' => $payload->changes->title->from]) !!}
    🏷 {!! __('tg-notifier::events/github/issues.edited.changes.title.to', ['title_to' => $payload->issue->title]) !!}
@elseif(isset($payload->changes->body))
📖 {!! __('tg-notifier::events/github/issues.edited.changes.body.title') !!}
{!! __('tg-notifier::events/github/issues.edited.changes.body.message') !!}
@endif
