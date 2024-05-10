<?php
/**
 * @var $payload object
 */

$pull_request = $payload->pull_request;
?>

‍👷‍♂️🛠️ {!! __('tg-notifier::events/github/pull_request.assigned.title', [
            'repo' => "🦑<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

{!! __('tg-notifier::events/github/pull_request.assigned.body', [
            'name' => "<a href='{$payload->assignee->html_url}'>@{$payload->assignee->login}</a>",
            'pullRequest' => "$pull_request->title",
        ]
    ) !!}
