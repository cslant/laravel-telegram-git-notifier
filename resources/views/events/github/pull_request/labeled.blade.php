<?php
/**
 * @var object $payload
 */
use Illuminate\Support\Str;

$pull_request = $payload->pull_request;
?>

‍👷‍♂️🛠️ {!! __('tg-notifier::events/github/pull_request.labeled.title', [
            'repo' => "🦑<a href='$pull_request->html_url'>{$payload->repository->full_name}#$pull_request->number</a>",
             'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

🔖 {!! __('tg-notifier::events/github/pull_request.labeled.name') !!}: <code>{{ $payload->label->name }}</code>
📑 {!! __('tg-notifier::events/github/pull_request.labeled.description') !!}: {{ Str::limit($payload->label->description) }}
