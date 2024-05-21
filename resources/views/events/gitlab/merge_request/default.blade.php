<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
🔥 {{ __('tg-notifier::events/gitlab/merge_request.default') }}

🛠 <b>{{ $payload->object_attributes->title }}</b>
🌳 {{ __('tg-notifier::app.branch') }}: {{ $payload->object_attributes->source_branch }} -> {{ $payload->object_attributes->target_branch }} 🎯
@include('tg-notifier::events.shared.partials.gitlab._assignees', compact('payload', 'event'))
@include('tg-notifier::events.gitlab.merge_request.partials._reviewers', compact('payload'))
@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
