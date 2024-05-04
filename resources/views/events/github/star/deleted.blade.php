<?php
/**
 * @var $payload object
 */
?>

{!! __('tg-notifier::events/github/star.deleted.title', [
    'repo' => "<a href='{$payload->repository->html_url}'>{$payload->repository->full_name}</a>"
        ]
    ) !!}

👤 {!! __('tg-notifier::events/github/star.deleted.remover') !!}: <code>{{ $payload->sender->login }}</code> 👀