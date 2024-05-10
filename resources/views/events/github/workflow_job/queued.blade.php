<?php
/**
 * @var $payload object
 */

?>

{!! __('tg-notifier::events/github/workflow_job.queued.title', ['repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_job.queued.name') !!}: 💥 <code>{{ $payload->workflow_job->workflow_name }}</code> ⏰

🔗 {!! __('tg-notifier::events/github/workflow_job.link', ['link' => "<a href='{$payload->workflow_job->html_url}'>{$payload->workflow_job->name}</a>"]) !!}
