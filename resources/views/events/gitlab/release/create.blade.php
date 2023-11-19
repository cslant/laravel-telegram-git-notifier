<?php
/**
 * @var $payload mixed
 */

$message = "✅🚀 <b>Release Created</b> - 🦊<a href=\"{$payload->url}\">{$payload->project->path_with_namespace}#{$payload->tag}</a> by <b>{$payload->commit->author->name}</b>\n\n";

$message .= "🔖 <b>{$payload->tag}</b> \n";

$message .= "🗞 <b>{$payload->name}</b> \n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
