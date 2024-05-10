<?php
/**
 * @var $payload object
 */

if ($payload->workflow_job->conclusion === 'success') {
    $status = 'success';
    $icon = '🎉';
    $last = '✨';
} else {
    $status = 'failure';
    $icon = '🚫';
    $last = '❌';
}

$startedAt = new DateTime($payload->workflow_job->started_at);
$completedAt = new DateTime($payload->workflow_job->completed_at);
$interval = $completedAt->diff($startedAt);
$allSeconds = $interval->s + $interval->i * 60 + $interval->h * 3600;
?>

{{ $icon }} {!! __("tg-notifier::events/github/workflow_job.completed.$status", ['repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

🚀 {!! __('tg-notifier::events/github/workflow_job.name') !!}: {{ $icon }} <code>{{ $payload->workflow_job->name }}</code> {{ $last }}
🚨 {!! __('tg-notifier::events/github/workflow_job.status.title') !!}: <code>{!! __('tg-notifier::events/github/workflow_job.status.'.$status) !!}</code> 🕓 <code>{{ $allSeconds }}s</code>
🔗 {!! __('tg-notifier::events/github/workflow_job.link', ['link' => "<a href='{$payload->workflow_job->html_url}'>{$payload->workflow_job->workflow_name}</a>"]) !!}
