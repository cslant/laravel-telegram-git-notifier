<?php
/**
 * @var $payload object
 * @var $event string
 */

use Illuminate\Support\Str;

$html = '';
if (isset($event) && isset($payload) && !empty($payload->{$event}->body)) {
    $html = htmlentities(Str::limit($payload->{$event}->body));
}
?>
@if(!empty($html))
📖 <b>{!! __('tg-notifier::events/shared/github._body.title') !!}:</b>
<pre>{!! $html !!}</pre>
@endif
