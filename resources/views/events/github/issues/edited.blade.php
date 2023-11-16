<?php
/**
 * @var $payload mixed
 * @var $event string
 */

$issue = $payload->issue;
?>

{!! __('tg-notifier::events/github/issues.edited.title', [
            'issue' => "<a href='$issue->html_url'>{$payload->repository->full_name}#$issue->number</a>",
            'user' => "<a href='{$issue->user->html_url}'>@{$issue->user->login}</a>"
        ]
    ) !!}

{!! __('tg-notifier::events/github/issues.issue_title') !!} <b><?= $issue->title; ?></b>

@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))

@if(isset($payload->changes->title))
    {!! "📖 <b>Title</b> has been changed\n" !!}
    {!! "    📝 <b>From:</b> {$payload->changes->title->from}\n" !!}
    {!! "    🏷 <b>To:</b> {$payload->issue->title}\n" !!}
@elseif(isset($payload->changes->body))
    {!! "📖 <b>Body</b> has been changed\n"!!}
    {!! "Please check the issue for more details\n"!!}
@endif
