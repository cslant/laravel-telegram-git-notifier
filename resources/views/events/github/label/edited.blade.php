<?php
/**
 * @var $payload object
 */

$changes = $payload->changes;
$label = $payload->label;
$description = strlen($label->description) < 50 ? $label->description : substr($label->description, 0, 50).'...';
if (isset($changes->description->from)) {
    $description_changes = strlen($changes->description->from) < 50 ? $changes->description->from : substr($changes->description->from, 0, 50).'...';
}
?>

👷‍♂️🛠️ {!! __('tg-notifier::events/github/label.edited.title', [
            'repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>",
        ]
    ) !!}

@if(isset($changes->name->from))
    📖 {!! __('tg-notifier::events/github/label.edited.changes.title.name') !!}
    📝 {!! __('tg-notifier::events/github/label.edited.changes.title.from', ['title_from' => $payload->changes->name->from]) !!}
    🏷 {!! __('tg-notifier::events/github/label.edited.changes.title.to', ['title_to' => $payload->label->name]) !!}
@else
📢 <b>{{ $label->name }}</b>
@endif

@if(isset($changes->description->from))
    📖 {!! __('tg-notifier::events/github/label.edited.changes.description.name') !!}
    📝 {!! __('tg-notifier::events/github/label.edited.changes.description.from', ['description_from' => $description_changes]) !!}
    🏷 {!! __('tg-notifier::events/github/label.edited.changes.description.to', ['description_to' => $description]) !!}
@else
<pre>{{ $description }}</pre>
@endif
