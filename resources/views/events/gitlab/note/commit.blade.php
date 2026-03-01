<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
💬 {!! __('tg-notifier::events/gitlab/note.title.commit', [
       'repo' => "<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}</a>",
       'user' => "<code>{$payload->user->name}</code>"
   ]
) !!}
━━━━━━━━━━━━━━━━━━━━
⚙️ {{ __('tg-notifier::app.commit') }}: <code>{{ $payload->commit->message }}</code>
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))

🔗 <a href="{{ $payload->object_attributes->url }}">View Comment</a>
