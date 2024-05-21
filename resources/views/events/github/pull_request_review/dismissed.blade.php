<?php
/**
 * @var object $payload
 */

$pull_request = $payload->pull_request;
?>

👷‍♂️🛠️ {!! __('tg-notifier::events/github/pull_request_review.dismissed.title', [
            'repo' => "🦑<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

🛠 {!! __('tg-notifier   ::events/github/pull_request_review.name') !!}: <code>{{ $pull_request->title }}</code>
🔗 {!! __('tg-notifier::events/github/pull_request_review.link', ['review' => "<a href='{$payload->review->html_url}'>#{$payload->review->id}</a>"]) !!}
