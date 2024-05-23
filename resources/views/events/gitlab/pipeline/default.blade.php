<?php
/**
 * @var object $payload
 * @var string $event
 */

?>

🛰 {{ __('tg-notifier::events/gitlab/pipeline.title') }} 🦊

🚀 {{ __('tg-notifier::app.repo') }}: <a href="{{ $payload->project->web_url }}">{{ $payload->project->path_with_namespace }}</a>
🌳 {{ __('tg-notifier::app.branch') }}: <code>{{ $payload->object_attributes->ref }}</code>
👤 {{ __('tg-notifier::app.author.name') }}: <code>{{ $payload->commit->author->name }}</code>
💻 {{ __('tg-notifier::app.commit') }}: <a href="{{ $payload->commit->url }}">{{ $payload->commit->message }}</a>
🚦 {{ __('tg-notifier::app.status') }}: Pipeline <code>{{ $payload->object_attributes->status }}</code> <code>{{ $payload->object_attributes->duration ? "⏱️ {$payload->object_attributes->duration}s" : '' }}</code>
