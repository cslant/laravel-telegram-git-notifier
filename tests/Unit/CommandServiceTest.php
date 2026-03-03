<?php

use CSlant\LaravelTelegramGitNotifier\Services\CommandService;

it('returns correct menu commands array', function () {
    $commands = CommandService::menuCommands();

    expect($commands)->toBeArray()
        ->toHaveCount(8)
        ->each(fn ($command) => $command->toHaveKeys(['command', 'description']));
});

it('includes required menu commands', function () {
    $commands = CommandService::menuCommands();
    $commandNames = array_column($commands, 'command');

    expect($commandNames)->toContain('/start')
        ->toContain('/menu')
        ->toContain('/token')
        ->toContain('/id')
        ->toContain('/usage')
        ->toContain('/server')
        ->toContain('/settings')
        ->toContain('/set_menu');
});

it('menu commands have non-empty descriptions', function () {
    $commands = CommandService::menuCommands();

    foreach ($commands as $command) {
        expect($command['description'])->not->toBeEmpty();
    }
});
