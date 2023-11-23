<?php

use CSlant\LaravelTelegramGitNotifier\Services\CommandService;

$menuCommands = CommandService::menuCommands() ?? [];
?>

<b>{{ __('tg-notifier::tools/menu.title') }}</b> 🤖

<?php foreach ($menuCommands as $menuCommand) : ?>
<b><?= $menuCommand['command'] ?></b> - <?= $menuCommand['description'] ?>

<?php endforeach; ?>
