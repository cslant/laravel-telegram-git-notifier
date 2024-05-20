<?php
/**
 * @var $payload object
 */

?>

💬 {!! __('tg-notifier::events/gitlab/note.title.issue', [
       'repo' => "🦊<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->issue->iid}</a>",
       'user' => "<b>{$payload->user->name}</b>"
   ]
) !!}

📢 <b>{{ $payload->issue->title }}</b>

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
