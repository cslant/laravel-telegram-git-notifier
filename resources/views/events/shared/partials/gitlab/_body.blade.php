<?php
/**
 * @var $payload object
 * @var $event string
 */

$html = '';
if (isset($event) && isset($payload)) {
    if (!empty($payload->object_attributes->description)) {
        $body = $payload->object_attributes->description;
    } elseif (!empty($payload->object_attributes->content)) {
        $body = $payload->object_attributes->content;
    } elseif (!empty($payload->object_attributes->note)) {
        $body = $payload->object_attributes->note;
    } elseif (!empty($payload->object_attributes->body)) {
        $body = $payload->object_attributes->body;
    } elseif (!empty($payload->description)) {
        $body = $payload->description;
    } else {
        return '';
    }
    if (strlen($body) > 100) {
        $body = substr($body, 0, 100) . '...';
    }

    $html = htmlentities($body);
}
?>
@if(!empty($html))
📖 <b>{!! __('tg-notifier::events/shared/gitlab._body.title') !!}:</b>
<pre>{!! $html !!}</pre>
@endif

