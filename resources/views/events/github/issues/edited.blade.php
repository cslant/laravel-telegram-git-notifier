<?php
/**
 * @var $payload mixed
 */

$message = "⚠️ <b>Issue has been edited</b> to 🦑<a href=\"{$payload->issue->html_url}\">{$payload->repository->full_name}#{$payload->issue->number}</a> by <a href=\"{$payload->issue->user->html_url}\">@{$payload->issue->user->login}</a>\n\n";

$message .= "📢 <b>{$payload->issue->title}</b>\n";

$message .= require __DIR__ . '/../../shared/partials/github/_assignees.php';

if (isset($payload->changes->title)) {
    $message .= "📖 <b>Title</b> has been changed\n";
    $message .= "    📝 <b>From:</b> {$payload->changes->title->from}\n";
    $message .= "    🏷 <b>To:</b> {$payload->issue->title}\n";
} elseif (isset($payload->changes->body)) {
    $message .= "📖 <b>Body</b> has been changed\n";
    $message .= "Please check the issue for more details\n";
}

echo $message;
