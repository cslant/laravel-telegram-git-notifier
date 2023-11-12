<?php
/**
 * @var $payload mixed
 */

$message = "📝 <b>Wiki Page Updated</b> - 🦊<a href=\"{$payload->object_attributes->url}\">{$payload->project->path_with_namespace}#{$payload->object_attributes->slug}</a> by <b>{$payload->user->name}</b>\n\n";

$message .= "🏷 Title: <b>{$payload->object_attributes->title}</b> \n\n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
