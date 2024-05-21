<?php
/**
 * @var object $payload
 * @var string $event
 */

if (isset($event) && isset($payload) && !empty($payload->assignees)) {
    $assigneeText = __('tg-notifier::events/shared/gitlab._assignee.title');
    $assigneeArray = [];
    foreach ($payload->assignees as $assignee) {
        $assigneeArray[] = "<b>{$assignee->name}</b>";
    }
    $assigneeText .= implode(', ', $assigneeArray);
}
?>
{!! $assigneeText ?? '' !!}
