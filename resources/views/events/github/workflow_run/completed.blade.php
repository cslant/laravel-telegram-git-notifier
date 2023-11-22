<?php
/**
 * @var $payload mixed
 */
?>

@switch($payload->workflow_run->conclusion)
    @case('success')
{!! __('tg-notifier::events/github/workflow_run.completed.success.title', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_run.completed.success.body', ['name' => $payload->workflow_run->name]) !!}
        @break
    @case('failure')
{!! __('tg-notifier::events/github/workflow_run.completed.failure.title', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_run.completed.failure.body', ['name' => $payload->workflow_run->name]) !!}
        @break
    @case('cancelled')
{!! __('tg-notifier::events/github/workflow_run.completed.cancelled.title', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_run.completed.cancelled.body', ['name' => $payload->workflow_run->name]) !!}
        @break
    @default
{!! __('tg-notifier::events/github/workflow_run.completed.default.title', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_run.completed.default.body', ['name' => $payload->workflow_run->name]) !!}
        @break
@endswitch

{!! __('tg-notifier::events/github/workflow_run.link', ['link' => "<a href='{$payload->workflow_run->html_url}'>{$payload->workflow_run->event} - {$payload->workflow_run->name}</a>"]) !!}
