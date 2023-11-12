<?php
/**
 * @var $payload mixed
 */

$message = "👷‍♂️🛠️ <b>New Pull Request</b> - 🦑<a href=\"{$payload->pull_request->html_url}\">{$payload->repository->full_name}#{$payload->pull_request->number}</a> create by <a href=\"{$payload->pull_request->user->html_url}\">@{$payload->pull_request->user->login}</a>\n\n";

$message .= "🛠 <b>{$payload->pull_request->title}</b> \n\n";

$message .= "🌳 {$payload->pull_request->head->ref} -> {$payload->pull_request->base->ref} 🎯 \n";

$message .= require __DIR__ . '/../../shared/partials/github/_assignees.php';

$message .= require __DIR__ . '/partials/_reviewers.php';

$message .= require __DIR__ . '/../../shared/partials/github/_body.php';

echo $message;
