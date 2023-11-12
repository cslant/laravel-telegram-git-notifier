<?php
/**
 * @var $payload mixed
 */

$message = "👷‍♂️🛠️ <b>Merge Request Updated</b> to 🦊<a href=\"{$payload->object_attributes->url}\">{$payload->project->path_with_namespace}#{$payload->object_attributes->iid}</a> by <b>{$payload->user->name}</b>\n\n";

$message .= "🛠 <b>{$payload->object_attributes->title}</b> \n\n";

$message .= "🌳 {$payload->object_attributes->source_branch} -> {$payload->object_attributes->target_branch} 🎯 \n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_assignees.php';

$message .= require __DIR__ . '/partials/_reviewers.php';

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
