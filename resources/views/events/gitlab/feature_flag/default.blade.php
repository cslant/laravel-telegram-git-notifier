<?php
/**
 * @var object $payload
 * @var string $event
 */

$flagUrl = $payload->project->web_url."/-/feature_flags/".$payload->object_attributes->id;
$flatTag = "<a href=\"{$flagUrl}\">{$payload->project->path_with_namespace}#{$payload->object_attributes->name}</a>";
$userTag = "<a href=\"{$payload->user_url}\">{$payload->user->name}</a>";

if ($payload->object_attributes->active) {
    $active = "enabled";
    $icon = "🚩";
} else {
    $active = "disabled";
    $icon = "🏴";
}
?>

{!! $icon !!} {!! __('tg-notifier::events/gitlab/feature_flag.title'.$active, [
        'flag_tag' => '🦊'.$flagTag,
        'user_tag' => $userTag,
    ]) !!}

{!! $icon !!} {!! __('tg-notifier::events/gitlab/feature_flag.name', ['flag_name' => $payload->object_attributes->name]) !!}

@include('tg-notifier::events.shared.partials.gitlab._body', compact('payload', 'event'))
