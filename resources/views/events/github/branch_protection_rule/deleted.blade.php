<?php
/**
 * @var $payload object
 */

$repository = $payload->repository;
?>

🗑 {!! __('tg-notifier::events/github/branch_protection_rule.deleted.title', [
    'repo' => "🦑<a href='$repository->html_url'>$repository->full_name</a>"
        ]
    ) !!}

🛡 {!! __('tg-notifier::events/github/branch_protection_rule.name') !!}: <b>{{ $payload->rule->name }}</b>
