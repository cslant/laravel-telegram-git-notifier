<?php
/**
 * @var $payload object
 */

$pull_request = $payload->pull_request;
$description = strlen($payload->label->description) > 50 ? $payload->label->description : substr($payload->label->description, 0, 50).'...';
?>

{!! __('tg-notifier::events/github/pull_request.labeled.title', [
            'repo' => "<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
             'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

📢 <b>{{ $payload->label->name }}</b>
{{ $description }}
