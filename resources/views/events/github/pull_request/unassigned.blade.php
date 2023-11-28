<?php
/**
 * @var $payload object
 */

$pull_request = $payload->pull_request;
?>

{!! __('tg-notifier::events/github/pull_request.unassigned.title', [
            'repo' => "<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$pull_request->user->html_url}'>@{$pull_request->user->login}</a>"
        ]
    ) !!}

{!! __('tg-notifier::events/github/pull_request.unassigned.body', [
            'name' => "<a href='{$payload->assignee->html_url}'>@{$payload->assignee->login}</a>",
            'pullRequest' => "$pull_request->title",
        ]
    ) !!}
