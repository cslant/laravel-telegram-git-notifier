<?php
/**
 * @var $payload object
 * @var $event string
 */

$pull_request = $payload->pull_request;
?>

👷‍♂️🛠️ {!! __('tg-notifier::events/github/pull_request.opened.title', [
            'repo' => "🦑<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

📢 <b>{{ $pull_request->title }}</b>

🌳 {{ $pull_request->head->ref }} -> {{ $pull_request->base->ref }} 🎯
@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))
@include('tg-notifier::events.github.pull_request.partials._reviewers', compact('payload'))
@include('tg-notifier::events.shared.partials.github._body', compact('payload', 'event'))
