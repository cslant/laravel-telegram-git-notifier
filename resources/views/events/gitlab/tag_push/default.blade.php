<?php
/**
 * @var object $payload
 */

$ref = explode('/', $payload->ref);
$tag = implode('/', array_slice($ref, 2));
$tagUrl = $payload->project->web_url.'/tags/'.$tag;
?>

⚙️ {!! __('tg-notifier::events/gitlab/tag_push.title', [
       'repo' => "🦊<a href='{$payload->project->web_url}'>{$payload->project->path_with_namespace}</a>",
   ]) !!}

🔖 <b>{!! __('tg-notifier::events/gitlab/tag_push.name') !!}</b>: <a href='{{ $tagUrl }}'>{{ $tag }}</a>
👤 {!! __('tg-notifier::events/gitlab/tag_push.pusher') !!}: <code>{{ $payload->user_name }}</code>
