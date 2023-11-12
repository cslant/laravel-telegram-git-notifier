<?php
/**
 * @var string $platform
 */

$docsUrl = 'https://docs.github.com/en/developers/webhooks-and-events/webhook-events-and-payloads';
if ($platform === 'gitlab') {
    $docsUrl = 'https://docs.gitlab.com/ee/user/project/integrations/webhooks.html';
}
?>
Go to check the <a href="<?= $docsUrl ?>"><?= $platform ?> documentation</a> for more information about events.
---
<b>Click and configure child events if the option has the ⚙ icon.</b>
And select an event to enable or disable notifications:
