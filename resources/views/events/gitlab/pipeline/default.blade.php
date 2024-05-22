<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
🔥 {{ __('tg-notifier::events/gitlab/merge_request.default') }}

🛠 <a href="{{ $payload->project->web_url }}">{{ $payload->project->path_with_namespace }}</a>
🌳 {{ __('tg-notifier::app.branch') }}: <code>{{ $payload->object_attributes->ref }}</code>
📝 {{ __('tg-notifier::app.commit') }}: <code>{{ $payload->commit->message }}</code>
🔗 {{ __('tg-notifier::app.link') }}: <a href="{{ $payload->commit->url }}">{{ $payload->commit->id }}</a>
🚦 {{ __('tg-notifier::app.status') }}: <code>{{ $payload->object_attributes->status }}</code>
