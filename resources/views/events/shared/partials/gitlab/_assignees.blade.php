<?php
/**
 * @var $payload mixed
 * @var $event string
 */

if (isset($event) && isset($payload) && !empty($payload->assignees)) {
    $assigneeText = "🙋 Assignee: ";
    $assigneeArray = [];
    foreach ($payload->assignees as $assignee) {
        $assigneeArray[] = "<b>{$assignee->name}</b>";
    }
    $assigneeText .= implode(', ', $assigneeArray) . "\n";
}

return $assigneeText ?? '';
