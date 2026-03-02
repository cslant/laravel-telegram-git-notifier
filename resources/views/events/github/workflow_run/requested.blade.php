<?php
/**
 * @var object $payload
 */

?>

🔧 {!! __('tg-notifier::events/github/workflow_run.requested.title', ['repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"]) !!}
━━━━━━━━━━━━━━━━━━━━
⏳ {!! __('tg-notifier::events/github/workflow_run.requested.body') !!}: <code>{!! $payload->workflow_run->name !!}</code>
📝 {!! __('tg-notifier::events/github/workflow_run.display_title') !!}: <code>{!! $payload->workflow_run->display_title !!}</code>

🔗 <a href="{{ $payload->workflow_run->html_url }}">View Run</a>
