<?php
/**
 * @var $payload mixed
 */
?>

{!! __('tg-notifier::events/github/workflow_run.requested.title', ['user' => "<a href='{$payload->repository->html_url}'>{$payload->repository->html_url}</a>"]) !!}

{!! __('tg-notifier::events/github/workflow_run.requested.body', ['name' => $payload->workflow_run->runner_name]) !!}

{!! __('tg-notifier::events/github/workflow_run.link', ['link' => "<a href='{$payload->workflow_run->html_url}'>{$payload->workflow_run->html_url}</a>"]) !!}
