<?php
/**
 * @var object $payload
 */

?>

🔧 {!! __('tg-notifier::events/github/workflow_job.queued.title', ['repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}
━━━━━━━━━━━━━━━━━━━━
{!! __('tg-notifier::events/github/workflow_job.queued.name') !!}: <code>{{ $payload->workflow_job->name }}</code> ⏰

🔗 <a href="{{ $payload->workflow_job->html_url }}">View Job</a>
