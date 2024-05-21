<?php
/**
 * @var object $payload
 */

?>

🚫 {!! __('tg-notifier::events/github/star.deleted.title') !!} 🦑<a href='{{ $payload->repository->html_url }}'>{{ $payload->repository->full_name }}</a>

👤 {!! __('tg-notifier::events/github/star.deleted.remover') !!}: <code>{{ $payload->sender->login }}</code> 👀
