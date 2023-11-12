<?php
/**
 * @var $payload mixed
 */

$message = "🎉 <b>Watch Started</b> form 🦑<a href=\"{$payload->repository->html_url}\">{$payload->repository->full_name}</a>\n\n";

$message .= "👤 Watcher: <b>{$payload->sender->login}</b> 👀\n\n";

echo $message;
