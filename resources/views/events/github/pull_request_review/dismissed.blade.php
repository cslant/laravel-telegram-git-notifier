<?php
/**
 * @var $payload mixed
 */

$message = "👷‍♂️🛠️ <b>Dismissed Pull Request Review Comment</b> 💬 - 🦑<a href=\"{$payload->pull_request->html_url}\">{$payload->repository->full_name}#{$payload->pull_request->number}</a> by <a href=\"{$payload->review->user->html_url}\">@{$payload->review->user->login}</a>\n\n";

$message .= "🛠 <b>{$payload->pull_request->title}</b> \n\n";

$message .= "🔗 Link: <a href=\"{$payload->review->html_url}\">{$payload->review->html_url}</a>\n\n";

echo $message;
