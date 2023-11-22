<?php
/**
 * @var $payload mixed
 */
?>

@if($payload->workflow_job->conclusion === 'success')
{!! __('tg-notifier::events/github/workflow_job.completed.completed', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->html_url}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_job.completed.done', ['runner_name' => $payload->workflow_job->runner_name]) !!}
@else
{!! __('tg-notifier::events/github/workflow_job.completed.canceled', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->html_url}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_job.completed.failed', ['runner_name' => $payload->workflow_job->runner_name]) !!}
@endif

{!! __('tg-notifier::events/github/workflow_job.link', ['link' => "<a href='{$payload->workflow_job->html_url}'>{$payload->workflow_job->workflow_name}</a>"]) !!}
