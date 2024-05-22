<?php
/**
 * @var object $payload
 */
use Illuminate\Support\Str;

$changes = $payload->changes;
$label = $payload->label;
$description = Str::limit($label->description);
if (isset($changes->description->from)) {
    $description_changes = Str::limit($changes->description->from);
}
?>

⚙ {!! __('tg-notifier::events/github/label.edited.title', [
            'repo' => "🦑<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>",
        ]
    ) !!}

@if(isset($changes->name->from))
📖 {!! __('tg-notifier::events/github/label.edited.changes.title.name') !!}
📝 {!! __('tg-notifier::events/github/label.edited.changes.title.from', ['title_from' => "<code>{$payload->changes->name->from}</code>"]) !!}
🔖 {!! __('tg-notifier::events/github/label.edited.changes.title.to', ['title_to' => "<code>{$payload->label->name}</code>"]) !!}
@else
🔖 <b>{{ $label->name }}</b>
@endif

@if(isset($changes->description->from))
📖 {!! __('tg-notifier::events/github/label.edited.changes.description.name') !!}
📝 {!! __('tg-notifier::events/github/label.edited.changes.description.from', ['description_from' => "<code>{$description_changes}</code>"]) !!}
🏷 {!! __('tg-notifier::events/github/label.edited.changes.description.to', ['description_to' => "<code>{$description}</code>"]) !!}
@else
<b>{!! __('tg-notifier::events/shared/github._description.title') !!}:</b> {{ $description }}
@endif
