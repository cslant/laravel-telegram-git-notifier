<?php
/**
 * @var object $payload
 */

$pull_request = $payload->pull_request;
?>

🔀 {!! __('tg-notifier::events/github/pull_request.unlocked.title', [
            'repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}
━━━━━━━━━━━━━━━━━━━━
📦 <a href="{{ $pull_request->html_url }}">#{{ $pull_request->number }}</a> <code>{{ $pull_request->title }}</code>

🔗 <a href="{{ $pull_request->html_url }}">View Pull Request</a>
