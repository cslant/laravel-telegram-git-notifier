<?php
/**
 * @var $payload mixed
 */

if ($payload->object_attributes->active) {
    $active = "Enabled";
    $icon = "🚩";
} else {
    $active = "Disabled";
    $icon = "🏴";
}

$flagUrl = $payload->project->web_url . "/-/feature_flags/" . $payload->object_attributes->id;

$message = "{$icon} <b>Feature Flag {$active}</b> - 🦊<a href=\"{$flagUrl}\">{$payload->project->path_with_namespace}#{$payload->object_attributes->name}</a> by <a href=\"{$payload->user_url}\">{$payload->user->name}</a>\n\n";

$message .= "{$icon} Name: <b>{$payload->object_attributes->name}</b> \n\n";

$message .= require __DIR__ . '/../../shared/partials/gitlab/_body.php';

echo $message;
