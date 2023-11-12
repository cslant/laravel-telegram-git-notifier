<?php
/**
 * @var $payload mixed
 */

if ($payload->workflow_job->conclusion === 'success') {
    $message = "🎉 <b>Action Completed</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

    $message .= "Done action: 🎉 <b>{$payload->workflow_job->runner_name}</b> ✨ \n\n";
} else {
    $message = "🚫 <b>Canceled Action</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

    $message .= "Failed action: 🚫 <b>{$payload->workflow_job->runner_name}</b> ❌ \n\n";
}

$message .= "🔗 Link: <a href=\"{$payload->workflow_job->html_url}\">{$payload->workflow_job->html_url}</a>\n\n";

echo $message;
