<?php
/**
 * @var $payload object
 * @var $event string
 */

?>

✅🚀 {!! __('tg-notifier::events/gitlab/release.title.create', [
       'repo' => "🦊<a href='$payload->url'>{$payload->project->path_with_namespace}#{$payload->tag}</a>",
       'user' => "<b>{$payload->commit->author->name}</b>"
   ]) !!}

🔖 <b>{{ $payload->tag }}</b>
🗞 <b>{{ $payload->name }}</b>

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
