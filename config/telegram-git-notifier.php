<?php

return [
    'app' => [
        'name' => env('APP_NAME', 'Laravel Telegram Git Notify'),
        'url'      => env('APP_URL', 'http://localhost:8000'),
        'timezone' => env('TIMEZONE','Asia/Ho_Chi_Minh'),
    ],

    'telegram-bot' => [
        'token'           => env('TELEGRAM_BOT_TOKEN', ''),
        'chat_id'         => env('TELEGRAM_BOT_CHAT_ID', ''),
        'notify_chat_ids' => explode(
            ',',
            env('TELEGRAM_NOTIFY_CHAT_IDS', '')
        ),
    ],

    'author' => [
        'contact'     => env('TGN_AUTHOR_CONTACT', 'https://t.me/tannp27'),
        'source_code' => env('TGN_AUTHOR_SOURCE_CODE','https://github.com/lbiltech/telegram-git-notifier'),
    ],

    'view' => [
        'path'  => env('TGN_VIEW_PATH', 'resources/views/telegram-git-notifier'),
        'event' => [
            'default' => env('TGN_VIEW_EVENT_DEFAULT', 'default'),
        ],
        'globals' => [
            'access_denied' => env('TGN_VIEW_GLOBALS_ACCESS_DENIED', 'globals.access_denied'),
        ]
    ]
];
