<?php
/**
 * @var string $event
 * @var string $platform
 */

$platformIcon = '🦑';
if ($platform === 'gitlab') {
    $platformIcon = '🦊';
}
?>
{!! __('tg-notifier::tools/custom_event_action.title', ['event' => $event, 'platformIcon' => $platformIcon]) !!}
{!! __('tg-notifier::tools/custom_event_action.actionPrompt') !!}
