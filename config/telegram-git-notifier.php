<?php

return [
    'app' => [
        'name'     => env('APP_NAME', 'Laravel Telegram Git Notify'),
        'url'      => env('APP_URL', 'http://localhost:8000'),
        'timezone' => env('TIMEZONE', 'Asia/Ho_Chi_Minh'),
    ],

    'bot' => [
        'token'           => env('TELEGRAM_BOT_TOKEN', ''),
        'chat_id'         => env('TELEGRAM_BOT_CHAT_ID', ''),
        'notify_chat_ids' => env('TELEGRAM_NOTIFY_CHAT_IDS', ''),
    ],

    'author' => [
        'discussion'  => env('TGN_AUTHOR_CONTACT', 'https://t.me/tannp27'),
        'source_code' => env(
            'TGN_AUTHOR_SOURCE_CODE',
            'https://github.com/lbiltech/laravel-telegram-git-notifier'
        ),
    ],

    'data_file' => [
        'setting' => env(
            'TGN_PATH_SETTING',
            storage_path('/app/tgn-json/tgn-settings.json')
        ),

        'platform' => [
            'gitlab' => env(
                'TGN_PATH_PLATFORM_GITLAB',
                storage_path('/app/tgn-json/gitlab-events.json')
            ),
            'github' => env(
                'TGN_PATH_PLATFORM_GITHUB',
                storage_path('/app/tgn-json/github-events.json')
            ),
        ],
    ],

    'view' => [
        'default' => env(
            'TGN_VIEW_DEFAULT',
            base_path('resources/views/vendor/laravel-telegram-git-notify')
        ),

        'path' => env('TGN_VIEW_PATH', 'resources/views'),

        'event' => [
            'default' => env('TGN_VIEW_EVENT_DEFAULT', 'default'),
        ],

        'globals' => [
            'access_denied' => env(
                'TGN_VIEW_GLOBALS_ACCESS_DENIED',
                'globals.access_denied'
            ),
        ],

        'tools' => [
            'settings'            => env(
                'TGN_VIEW_TOOL_SETTING',
                'tools.settings'
            ),
            'custom_event_action' => env(
                'TGN_VIEW_TOOL_CUSTOM_EVENT_ACTION',
                'tools.custom_event_action'
            ),
            'custom_event'        => env(
                'TGN_VIEW_TOOL_CUSTOM_EVENT',
                'tools.custom_event'
            ),
            'set_menu_cmd'        => env(
                'TGN_VIEW_TOOL_SET_MENU_COMMAND',
                'tools.set_menu_cmd'
            ),
        ],
    ],

];
