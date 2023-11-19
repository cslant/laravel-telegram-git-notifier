<?php
/**
 * @var $payload mixed
 */

$message = "💬 <b>New Comment on Merge Request</b> - 🦊<a href=\"{$payload->object_attributes->url}\">{$payload->project->path_with_namespace}#{$payload->merge_request->iid}</a> by <b>{$payload->user->name}</b>\n\n";

$message .= "🛠 <b>{$payload->merge_request->title}</b> \n";

$message .= "🌳 {$payload->merge_request->source_branch} -> {$payload->merge_request->target_branch} 🎯 \n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
