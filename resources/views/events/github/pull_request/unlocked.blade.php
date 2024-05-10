<?php
/**
 * @var $payload object
 */

$pull_request = $payload->pull_request;
?>

‍👷‍♂️🛠️ {!! __('tg-notifier::events/github/pull_request.unlocked.title', [
            'repo' => "🦑<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

📢 <b>{{ $pull_request->title }}</b>
