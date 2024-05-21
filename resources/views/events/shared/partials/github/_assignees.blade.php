<?php
/**
 * @var object $payload
 * @var string $event
 */

$assigneeText = '';
if (isset($event) && isset($payload) && !empty($payload->{$event}->assignees)) {
    $assigneeArray = [];
    foreach ($payload->{$event}->assignees as $assignee) {
        $assigneeArray[] = "<a href=\"{$assignee->html_url}\">@{$assignee->login}</a> ";
    }
    $assigneeText .= implode(', ', $assigneeArray);
}
?>
@if(!empty($assigneeText))
🙋 <b>{!! __('tg-notifier::events/shared/github._assignee.title') !!}</b>: {!! $assigneeText !!}
@endif
