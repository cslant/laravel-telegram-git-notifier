<?php
/**
 * @var $payload mixed
 */

$textReviewers = '';
if (isset($payload->reviewers) && count($payload->reviewers) > 0) {
    $reviewers = [];
    foreach ($payload->reviewers as $reviewer) {
        $reviewers[] = "<b>{$reviewer->name}</b>";
    }

    $textReviewers .= "👥 Reviewers: " . implode(', ', $reviewers) . "\n";
}

return $textReviewers;
