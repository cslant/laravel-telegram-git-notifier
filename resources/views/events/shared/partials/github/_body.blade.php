<?php
/**
 * @var $payload mixed
 * @var $event string
 */

$html = '';
if (isset($event) && isset($payload) && !empty($payload->{$event}->body)) {
    $body = $payload->{$event}->body;
    if (strlen($body) > 50) {
        $body = substr($body, 0, 50).'...';
    }

    $html = __('tg-notifier::events/shared/github._body.title', ['body' => $body])."\n{$body}";
}
?>
{!! htmlentities($html) !!}
