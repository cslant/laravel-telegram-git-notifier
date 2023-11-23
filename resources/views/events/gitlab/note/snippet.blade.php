<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
{!! __('tg-notifier::events/gitlab/note.title.snippet', [
       'repo' => "<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}</a>",
       'user' => "<b>{$payload->user->name}</b>"
   ]
) !!}

📝 <b>{{ $payload->snippet->title }}</b>

🔗 <a href="{{ $payload->object_attributes->url }}">{{ __('tg-notifier::events/gitlab/note.snippet_comment') }}</a>

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
