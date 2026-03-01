<?php
/**
 * @var object $payload
 * @var string $event
 */

?>
🔧 {{ __('tg-notifier::events/gitlab/job.title') }}
━━━━━━━━━━━━━━━━━━━━
🚀 {{ __('tg-notifier::app.repo') }}: <a href="{{ $payload->project->web_url }}">{{ $payload->project->path_with_namespace }}</a>
🛠 {{ __('tg-notifier::events/gitlab/job.name') }}: <code>{{ $payload->build_name }}</code>
🌳 {{ __('tg-notifier::app.branch') }}: <code>{{ $payload->project->default_branch }}</code>
👤 {{ __('tg-notifier::app.author.name') }}: <code>{{ $payload->commit->author_name }}</code>
💻 {{ __('tg-notifier::app.commit') }}: <code>{{ $payload->commit->message }}</code>
🚦 {{ __('tg-notifier::app.status') }}: <code>{{ $payload->build_status }}</code>

🔗 <a href="{{ $payload->project->web_url }}/-/jobs/{{ $payload->build_id }}">View Job</a>
