<?php
/**
 * @var $payload object
 * @var $event string
 */

$html = '';
if (isset($event) && isset($payload) && !empty($payload->{$event}->body)) {
    $body = $payload->{$event}->body;
    if (strlen($body) > 100) {
        $body = substr($body, 0, 100).'...';
    }

    $html = htmlentities($body);
}
?>
@if(!empty($html))
📖 <b>{!! __('tg-notifier::events/shared/github._body.title') !!}:</b>
<pre>{!! $html !!}</pre>
@endif
