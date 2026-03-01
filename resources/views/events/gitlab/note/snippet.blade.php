<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
💬 {!! __('tg-notifier::events/gitlab/note.title.snippet', [
       'repo' => "<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}</a>",
       'user' => "<b>{$payload->user->name}</b>"
   ]
) !!}
━━━━━━━━━━━━━━━━━━━━
📝 {{ __('tg-notifier::app.title') }}: <code>{{ $payload->snippet->title }}</code>
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))

🔗 <a href="{{ $payload->object_attributes->url }}">View Comment</a>
