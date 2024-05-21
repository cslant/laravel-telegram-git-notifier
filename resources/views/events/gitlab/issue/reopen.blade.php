<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
⚠️ {!! __('tg-notifier::events/gitlab/issues.reopened.title', [
            'issue' => "⚠️ to 🦊 <a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->object_attributes->id}</a>",
            'user' => "<b>{$payload->user->name}</b>"
        ]
    ) !!}

📢 {{ __('tg-notifier::app.title') }}: <code>{{ $payload->object_attributes->title }}</code>
@include('tg-notifier::events.shared.partials.gitlab._assignees', compact('payload', 'event'))
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
