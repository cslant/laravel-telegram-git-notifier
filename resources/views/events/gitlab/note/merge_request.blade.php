<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
💬 {!! __('tg-notifier::events/gitlab/note.title.merge_request', [
       'repo' => "🦊<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->merge_request->iid}</a>",
       'user' => "<b>{$payload->user->name}</b>"
   ]
) !!}

🛠 <b>{{ $payload->merge_request->title }}</b>
🌳 {{ $payload->merge_request->source_branch }} -> {{ $payload->merge_request->target_branch }} 🎯

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
