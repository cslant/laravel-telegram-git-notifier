<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
*/

use CSlant\LaravelTelegramGitNotifier\Tests\TestCase;

uses(TestCase::class)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

if (!function_exists('fakeTelegramResponse')) {
    function fakeTelegramResponse(bool $success = true, array $data = []): array
    {
        return [
            'ok' => $success,
            'result' => $data,
        ];
    }
}
