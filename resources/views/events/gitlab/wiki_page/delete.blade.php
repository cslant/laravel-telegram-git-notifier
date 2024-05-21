<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
🗑 {!! __('tg-notifier::events/gitlab/wiki_page.title.delete', [
       'repo' => "🦊<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->object_attributes->slug}</a>",
       'user' => "<code>{$payload->user->name}</code>"
   ]) !!}

📝 {!! __('tg-notifier::events/gitlab/wiki_page.name') !!}: <code>{{ $payload->object_attributes->title }}</code>

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
