<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
{!! __('tg-notifier::events/gitlab/note.title.commit', [
       'repo' => "<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}</a>",
       'user' => "<b>{$payload->user->name}</b>"
   ]
) !!}

⚙️ <b>{{ $payload->commit->message }}</b>

{!! __('tg-notifier::events/gitlab/note.view_comment', [
       'link' => "<a href='{$payload->object_attributes->url}'>{$payload->commit->id}</a>"
   ]
) !!}

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
