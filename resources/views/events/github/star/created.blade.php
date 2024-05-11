<?php
/**
 * @var $payload object
 */

?>

🎉 {!! __('tg-notifier::events/github/star.created.title') !!} 🦑<a href='{{ $payload->repository->html_url }}'>{{ $payload->repository->full_name }}</a>

👤 {!! __('tg-notifier::events/github/star.created.seeder') !!}: <code>{{ $payload->sender->login }}</code> 👀
