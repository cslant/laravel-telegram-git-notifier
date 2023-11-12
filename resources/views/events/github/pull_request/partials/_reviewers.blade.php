<?php
/**
 * @var $payload mixed
 */

$textReviewers = '';
if (isset($payload->pull_request->requested_reviewers) && count($payload->pull_request->requested_reviewers) > 0) {
    $reviewers = [];
    foreach ($payload->pull_request->requested_reviewers as $reviewer) {
        $reviewers[] = "<b>{$reviewer->login}</b>";
    }

    $textReviewers .= "👥 Reviewers: " . implode(', ', $reviewers) . "\n";
}

return $textReviewers;
