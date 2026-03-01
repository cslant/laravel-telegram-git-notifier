<?php
/**
 * @var object $payload
 * @var string $event
 */

$pull_request = $payload->pull_request;

$icon = '✅';
$titleKey = 'tg-notifier::events/github/pull_request.closed.title_merged';
if (!isset($payload->pull_request->merged) || $payload->pull_request->merged !== true) {
    $icon = '🚫';
    $titleKey = 'tg-notifier::events/github/pull_request.closed.title_closed';
}
$message = $icon . ' ' . __($titleKey);
?>

{!! __('tg-notifier::events/github/pull_request.closed.title', [
        'title' => $message,
        'repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
         'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
    ]) !!}
━━━━━━━━━━━━━━━━━━━━
📦 <a href="{{ $pull_request->html_url }}">#{{ $pull_request->number }}</a> <code>{{ $pull_request->title }}</code>

⎇ <code>{{ $pull_request->head->ref }}</code> → <code>{{ $pull_request->base->ref }}</code>
@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))
@include('tg-notifier::events.github.pull_request.partials._reviewers', compact('payload'))
@include('tg-notifier::events.shared.partials.github._body', compact('payload', 'event'))

🔗 <a href="{{ $pull_request->html_url }}">View Pull Request</a>
