<?php
/**
 * @var $payload object
 */

?>

🔧 {!! __('tg-notifier::events/github/workflow_job.in_progress.progress', ['repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->html_url}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_job.in_progress.running') !!}: 💥 <code>{{ $payload->workflow_job->workflow_name }}</code> ⏳
🔗 {!! __('tg-notifier::events/github/workflow_job.link', ['link' => "<a href='{$payload->workflow_job->html_url}'>{$payload->workflow_job->name}</a>"]) !!}
