<?php
/**
 * @var object $payload
 */

$textReviewers = '';
if (isset($payload->reviewers) && count($payload->reviewers) > 0) {
    $reviewers = [];
    foreach ($payload->reviewers as $reviewer) {
        $reviewers[] = "<b>{$reviewer->name}</b>";
    }

    $textReviewers .= '👥' . __('tg-notifier::events/gitlab/merge_request.review') . implode(', ', $reviewers);
}
?>
{!! $textReviewers !!}
