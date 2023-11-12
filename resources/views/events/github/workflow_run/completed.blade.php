<?php
/**
 * @var $payload mixed
 */

switch ($payload->workflow_run->conclusion) {
    case 'success':
        $message = "🎉 <b>Workflow Completed</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

        $message .= "Done workflow: 🎉 <b>{$payload->workflow_run->name}</b> ✨ \n\n";

        break;
    case 'failure':
        $message = "🚫 <b>Workflow Failed</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

        $message .= "Failed workflow: 🚫 <b>{$payload->workflow_run->name}</b> ❌ \n\n";

        break;
    case 'cancelled':
        $message = "❌ <b>Workflow Cancelled</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

        $message .= "Cancelled workflow: 🚨 <b>{$payload->workflow_run->name}</b> ❌ \n\n";

        break;
    default:
        $message = "🚨 <b>Workflow Can't Success</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

        $message .= "Can't Success workflow: 🚨 <b>{$payload->workflow_run->name}</b> ❌ \n\n";

        break;
}

// $message .= "📤 Commit: <b>{$payload->workflow_run->head_commit->message}</b>\n\n";

$message .= "🔗 Link: <a href=\"{$payload->workflow_run->html_url}\">{$payload->workflow_run->html_url}</a>\n\n";

echo $message;
