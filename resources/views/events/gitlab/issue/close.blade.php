<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
{!! __('tg-notifier::events/gitlab/issues.closed.title', [
            'issue' => "<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->object_attributes->id}</a>",
            'user' => "<b>{$payload->user->name}</b>"
        ]
    ) !!}

📢 <b>{{ $payload->object_attributes->title }}</b>

@include('tg-notifier::events.shared.partials.gitlab._assignees', compact('payload', 'event'))
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
