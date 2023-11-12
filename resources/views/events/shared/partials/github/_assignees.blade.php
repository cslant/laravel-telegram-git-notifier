<?php
/**
 * @var $payload mixed
 * @var $event string
 */

if (isset($event) && isset($payload) && !empty($payload->{$event}->assignees)) {
    $assigneeText = "🙋 Assignee: ";
    $assigneeArray = [];
    foreach ($payload->{$event}->assignees as $assignee) {
        $assigneeArray[] = "<a href=\"{$assignee->html_url}\">@{$assignee->login}</a> ";
    }
    $assigneeText .= implode(', ', $assigneeArray)."\n";
}
?>
{!! $assigneeText ?? '' !!}
