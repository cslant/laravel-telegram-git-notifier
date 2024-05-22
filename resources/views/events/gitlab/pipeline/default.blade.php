<?php
/**
 * @var object $payload
 * @var string $event
 */

?>

🦊 {{ __('tg-notifier::events/gitlab/pipeline.title') }} 🔥

🚀 {{ __('tg-notifier::app.repo') }}: <a href="{{ $payload->project->web_url }}">{{ $payload->project->path_with_namespace }}</a>
🌳 {{ __('tg-notifier::app.branch') }}: <code>{{ $payload->object_attributes->ref }}</code>
💻 {{ __('tg-notifier::app.commit') }}: <code>{{ $payload->commit->message }}</code>
🔗 {{ __('tg-notifier::app.link') }}: <a href="{{ $payload->commit->url }}">{{ $payload->commit->id }}</a>
🚦 {{ __('tg-notifier::app.status') }}: Pipeline <code>{{ $payload->object_attributes->status }}</code> ⏱️ {{ $payload->object_attributes->duration }}s
