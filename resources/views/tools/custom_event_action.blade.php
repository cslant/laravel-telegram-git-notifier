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
Setting actions for the <b><?= $event ?></b> event <?= $platformIcon ?>.
Please select an action of this event to enable or disable notifications:
