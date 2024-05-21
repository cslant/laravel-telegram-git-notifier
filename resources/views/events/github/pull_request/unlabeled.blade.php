<?php
/**
 * @var object $payload
 */

$pull_request = $payload->pull_request;
$description = strlen($payload->label->description) > 100 ? $payload->label->description : substr($payload->label->description, 0, 100).'...';
?>

‍👷‍♂️🛠️ {!! __('tg-notifier::events/github/pull_request.unlabeled.title', [
            'repo' => "🦑<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

🔖 {!! __('tg-notifier::events/github/pull_request.labeled.name') !!}: <code>{{ $payload->label->name }}</code>
📑 {!! __('tg-notifier::events/github/pull_request.labeled.description') !!}: {{ $description }}
