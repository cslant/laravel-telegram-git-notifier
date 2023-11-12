<?php
/**
 * @var $payload mixed
 */

$ref = explode('/', $payload->ref);
$tag = implode('/', array_slice($ref, 2));

$tagUrl = $payload->project->web_url . '/tags/' . $tag;

$message = "⚙️ <b>A new tag has been pushed to the project</b> 🦊<a href=\"{$payload->project->web_url}\">{$payload->project->path_with_namespace}</a>\n\n";

$message .= "🔖 Tag: <a href=\"{$tagUrl}\">{$tag}</a>\n\n";

$message .= "👤 Pushed by : <b>{$payload->user_name}</b>\n";

echo $message;
