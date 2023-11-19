<?php
/**
 * @var $payload mixed
 */

$message = "💬 <b>New Comment on Commit</b> - 🦊<a href=\"{$payload->object_attributes->url}\">{$payload->project->path_with_namespace}</a> by <b>{$payload->user->name}</b>\n\n";

$message .= "⚙️ <b>{$payload->commit->message}</b> \n\n";

$message .= "🔗 View Comment: <a href=\"{$payload->object_attributes->url}\">{$payload->commit->id}</a> \n\n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
