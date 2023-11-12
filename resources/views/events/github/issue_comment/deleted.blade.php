<?php
/**
 * @var $payload mixed
 */

$event = 'comment';

$message = "️🗑 <b>Issue Comment Deleted</b> 💬 from 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name} </a> by <a href=\"{$payload->sender->html_url}\">@{$payload->sender->login}</a>\n\n";

$message .= "📢 <b>{$payload->issue->title}</b>\n";

$message .= require __DIR__ . '/../../shared/partials/github/_assignees.php';

$message .= require __DIR__ . '/../../shared/partials/github/_body.php';

echo $message;
