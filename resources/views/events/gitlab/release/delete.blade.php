<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
📦 {!! __('tg-notifier::events/gitlab/release.title.delete', [
       'repo' => "<a href='$payload->url'>{$payload->project->path_with_namespace}#{$payload->tag}</a>",
       'user' => "<b>{$payload->commit->author->name}</b>"
   ]) !!}
━━━━━━━━━━━━━━━━━━━━
🔖 {{ __('tg-notifier::events/gitlab/release.tag') }}: <code>{{ $payload->tag }}</code>
🗞 {{ __('tg-notifier::events/gitlab/release.name') }}: <code>{{ $payload->name }}</code>
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))

🔗 <a href="{{ $payload->url }}">View Release</a>
