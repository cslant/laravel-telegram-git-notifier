<?php
/**
 * @var string $platform
 */

$docsUrl = 'https://docs.github.com/en/developers/webhooks-and-events/webhook-events-and-payloads';
if ($platform === 'gitlab') {
    $docsUrl = 'https://docs.gitlab.com/ee/user/project/integrations/webhooks.html';
}
$documentation = __('tg-notifier::tools/custom_event.documentation');
?>
{!! __('tg-notifier::tools/custom_event.title', ['link' => "<a href='$docsUrl'>$platform $documentation</a>"]) !!}
---
{!! __('tg-notifier::tools/custom_event.instruction') !!}
{!! __('tg-notifier::tools/custom_event.eventSelection') !!}
