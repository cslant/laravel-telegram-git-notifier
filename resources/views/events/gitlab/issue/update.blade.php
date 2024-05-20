<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
⚠️ {!! __('tg-notifier::events/gitlab/issues.edited.title', [
            'issue' => "🦊 <a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->object_attributes->id}</a>",
            'user' => "<b>{$payload->user->name}</b>"
        ]
    ) !!}

📢 <b>{{ $payload->object_attributes->title }}</b>

@include('tg-notifier::events.shared.partials.gitlab._assignees', compact('payload', 'event'))

@if(isset($payload->changes->title))
📖 {!! __('tg-notifier::events/gitlab/issues.edited.changes.title.name') !!}
📝 {!! __('tg-notifier::events/gitlab/issues.edited.changes.title.from', ['title_from' => $payload->changes->title->previous]) !!}
🏷 {!! __('tg-notifier::events/gitlab/issues.edited.changes.title.to', ['title_to' => $payload->changes->title->current]) !!}
@endif
@if(isset($payload->changes->description))
📖 {!! __('tg-notifier::events/gitlab/issues.edited.changes.body.title') !!}
    {!! __('tg-notifier::events/gitlab/issues.edited.changes.body.message') !!}
@endif
