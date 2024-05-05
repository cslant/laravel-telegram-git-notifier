<?php
/**
 * @var $payload object
 */

match ($payload->workflow_run->conclusion) {
    'success' => $status = 'success',
    'failure' => $status = 'failure',
    'cancelled' => $status = 'cancelled',
    default => $status = 'default',
};
?>

{!! __("tg-notifier::events/github/workflow_run.completed.$status.title", ['repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}

{!! __("tg-notifier::events/github/workflow_run.completed.$status.body", ['name' => $payload->workflow_run->name]) !!}
📝 {!! __('tg-notifier::events/github/workflow_run.display_title') !!}: <code>{!! $payload->workflow_run->display_title !!}</code>
🔗 {!! __('tg-notifier::events/github/workflow_run.link', ['link' => "<a href='{$payload->workflow_run->html_url}'>{$payload->workflow_run->event} - {$payload->workflow_run->name}</a>"]) !!}
