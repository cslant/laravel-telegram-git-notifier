<?php
/**
 * @var $payload object
 */

?>

{!! __('tg-notifier::events/github/delete.title') !!}

@if(isset($payload->organization))
    {!! __('tg-notifier::events/github/delete.organization', ['organization' => $payload->organization->login]) !!}
@endif
@if(isset($payload->repository))
    {!! __('tg-notifier::events/github/delete.full_name', ['full_name' => $payload->repository->full_name]) !!}
@endif
@if(isset($payload->sender))
    {!! __('tg-notifier::events/github/delete.sender', ['sender' => $payload->sender->login]) !!}
@endif
