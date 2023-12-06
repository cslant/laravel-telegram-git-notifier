<?php
/**
 * @var $payload object
 */

$pull_request = $payload->pull_request;
?>

{!! __('tg-notifier::events/github/pull_request_review.submitted.title', [
            'repo' => "<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

🛠 <b>{{ $pull_request->title }}</b>

{!! __('tg-notifier::events/github/pull_request_review.link', ['review' => "<a href='{$payload->review->html_url}'>{$payload->review->html_url}</a>"]) !!}
