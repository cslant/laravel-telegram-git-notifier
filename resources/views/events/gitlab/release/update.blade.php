<?php
/**
 * @var $payload object
 * @var $event string
 */

?>

📝🚀 {!! __('tg-notifier::events/gitlab/release.title.update', [
       'repo' => "🦊<a href='$payload->url'>{$payload->project->path_with_namespace}#{$payload->tag}</a>",
       'user' => "<b>{$payload->commit->author->name}</b>"
   ]) !!}

🔖 {{ __('tg-notifier::events/gitlab/release.tag') }}: <code>{{ $payload->tag }}</code>
🗞 {{ __('tg-notifier::events/gitlab/release.name') }}: <code>{{ $payload->name }}</code>
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
