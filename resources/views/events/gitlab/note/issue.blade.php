<?php
/**
 * @var $payload mixed
 */

$message = "💬 <b>New Comment on Issue</b> - 🦊<a href=\"{$payload->object_attributes->url}\">{$payload->project->path_with_namespace}#{$payload->issue->iid}</a> by <b>{$payload->user->name}</b>\n\n";

$message .= "📢 <b>{$payload->issue->title}</b> \n\n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
