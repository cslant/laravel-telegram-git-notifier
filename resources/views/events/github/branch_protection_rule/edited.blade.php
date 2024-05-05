<?php
/**
 * @var $payload object
 */

$repository = $payload->repository;
?>

📝 {!! __('tg-notifier::events/github/branch_protection_rule.edited.title', [
    'repo' => "🦑<a href='$repository->html_url'>$repository->full_name</a>"
        ]
    ) !!}

@if(isset($payload->changes->name->from))
📖 {!! __('tg-notifier::events/github/branch_protection_rule.edited.changes.title.name') !!}
    📝 {!! __('tg-notifier::events/github/issues.edited.changes.title.from', ['title_from' => $payload->changes->name->from]) !!}
    🛡 {!! __('tg-notifier::events/github/issues.edited.changes.title.to', ['title_to' => $payload->rule->name]) !!}
@else
🛡 {!! __('tg-notifier::events/github/branch_protection_rule.name') !!}: <b>{{ $payload->rule->name }}</b>
@endif
🔗 {!! __('tg-notifier::events/github/branch_protection_rule.edited.link', [
    'link' => "<a href='$repository->html_url/settings/branch_protection_rules/{$payload->rule->id}'>{$payload->rule->id}</a>"
        ]
    ) !!}
