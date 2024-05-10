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
?>

{{ $icon }} {!! __("tg-notifier::events/github/workflow_job.completed.$status", ['repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

🚀 {!! __('tg-notifier::events/github/workflow_job.name') !!}: {{ $icon }} <code>{{ $payload->workflow_job->name }}</code> {{ $last }}
🚨 {!! __('tg-notifier::events/github/workflow_job.status.title') !!}: {!! __('tg-notifier::events/github/workflow_job.status.'.$status) !!}
🔗 {!! __('tg-notifier::events/github/workflow_job.link', ['link' => "<a href='{$payload->workflow_job->html_url}'>{$payload->workflow_job->workflow_name}</a>"]) !!}
