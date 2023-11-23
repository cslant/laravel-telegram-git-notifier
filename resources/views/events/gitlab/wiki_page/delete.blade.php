<?php
/**
 * @var $payload object
 * @var $event string
 */

?>
{!! __('tg-notifier::events/gitlab/wiki_page.title.delete', [
       'repo' => "<a href='{$payload->object_attributes->url}'>{$payload->project->path_with_namespace}#{$payload->object_attributes->slug}</a>",
       'user' => "<b>{$payload->user->name}</b>"
   ]) !!}

{!! __('tg-notifier::events/gitlab/wiki_page.name', [
       'name' => "<b>{$payload->object_attributes->title}</b>"
   ]) !!}

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
