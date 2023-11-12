<?php
/**
 * @var $payload mixed
 */

$message = "💬 <b>New Comment on Snippet</b> - 🦊<a href=\"{$payload->object_attributes->url}\">{$payload->project->path_with_namespace}</a> by <b>{$payload->user->name}</b>\n\n";

$message .= "📝 <b>{$payload->snippet->title}</b> \n\n";

$message .= "🔗 <a href=\"{$payload->object_attributes->url}\">View Comment</a> \n\n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
