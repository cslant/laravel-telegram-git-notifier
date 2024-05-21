<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
💬 {!! __('tg-notifier::events/gitlab/note.title.commit', [
       'repo' => "🦊<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}</a>",
       'user' => "<code>{$payload->user->name}</code>"
   ]
) !!}

⚙️ {{ __('tg-notifier::app.commit') }}: <code>{{ $payload->commit->message }}</code>
🔗 {!! __('tg-notifier::events/gitlab/note.view_comment', [
       'link' => "<a href='{$payload->object_attributes->url}'>{$payload->commit->id}</a>"
   ]
) !!}
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
