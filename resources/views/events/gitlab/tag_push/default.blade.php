<?php
/**
 * @var $payload object
 */

$ref = explode('/', $payload->ref);
$tag = implode('/', array_slice($ref, 2));
$tagUrl = $payload->project->web_url.'/tags/'.$tag;
?>

{!! __('tg-notifier::events/gitlab/tag_push.title', [
       'repo' => "<a href='{$payload->project->web_url}'>{$payload->project->path_with_namespace}</a>",
   ]) !!}

{!! __('tg-notifier::events/gitlab/tag_push.name', [
       'tag_name' => "<a href='{$tagUrl}'>{$tag}</a>",
   ]) !!}

{!! __('tg-notifier::events/gitlab/tag_push.pusher', [
       'pusher' => "<b>{$payload->user_name}</b>",
   ]) !!}
