<?php

$configFileStorageFolder = storage_path(
    env('TGN_CONFIG_FILE_STORAGE_FOLDER', '/app/vendor/tg-notifier/jsons')
);
$routePrefix = env('TGN_DEFAULT_ROUTE_PREFIX', 'telegram-git-notifier');

return [
    'defaults' => [
        'paths' => [
            'views' => env('TGN_DEFAULT_PATH_VIEW', base_path('resources/views/vendor/tg-notifier')),
        ],

        /* Set route prefix for telegram git notifier app */
        'route_prefix' => $routePrefix,
    ],

    'app' => [
        'name' => env('TGN_APP_NAME', 'Laravel Telegram Git Notifier'),
        'timezone' => env('TIMEZONE', 'Asia/Ho_Chi_Minh'),

        /* Required for the bot to work properly */
        'url' => env('TGN_APP_URL', env('APP_URL', 'http://localhost')).'/'.$routePrefix,
        'request_verify' => env('TGN_REQUEST_VERIFY', false),
    ],

    'bot' => [
        'token' => env('TELEGRAM_BOT_TOKEN', ''),
        'chat_id' => env('TELEGRAM_BOT_CHAT_ID', ''),

        /**
         * Set the chat IDs that will receive notifications
         * You can add the owner bot ID, group ID, ...
         * -------------------------------------------------------
         * Note:
         * Please use semicolon ";" to separate chat ids
         * And use a colon ":" to separate chat ID and thread ID
         * And use comma "," if you want to add multiple thread IDs
         * -------------------------------------------------------
         * The environment variable is expected to be in the format:
         * "chat_id1;chat_id2:thread_id2;chat_id3:thread_id3_1,thread_id3_2;...".
         */
        'notify_chat_ids' => env('TELEGRAM_NOTIFY_CHAT_IDS', ''),
    ],

    'author' => [
        'discussion' => env('TGN_AUTHOR_DISCUSSION', 'https://github.com/cslant/laravel-telegram-git-notifier/discussions'),
        'source_code' => env('TGN_AUTHOR_SOURCE_CODE', 'https://github.com/cslant/laravel-telegram-git-notifier'),
    ],

    /* Set the path to the data file */
    'data_file' => [
        'storage_folder' => $configFileStorageFolder,
        'setting' => env('TGN_PATH_SETTING', $configFileStorageFolder.'/tgn-settings.json'),

        'platform' => [
            'gitlab' => env('TGN_PATH_PLATFORM_GITLAB', $configFileStorageFolder.'/gitlab-events.json'),
            'github' => env('TGN_PATH_PLATFORM_GITHUB', $configFileStorageFolder.'/github-events.json'),
        ],
    ],

    /* Set the path to the view file */
    'view' => [
        'ignore-message' => env('IGNORE_MESSAGE', 'ignore-message'),
        'namespace' => env('TGN_VIEW_NAMESPACE', 'tg-notifier'),
        'default' => env('TGN_VIEW_DEFAULT', base_path('resources/views/vendor/tg-notifier')),
        'event' => [
            'default' => env('TGN_VIEW_EVENT_DEFAULT', 'default'),
        ],

        'globals' => [
            'access_denied' => env('TGN_VIEW_GLOBALS_ACCESS_DENIED', 'globals.access_denied'),
        ],

        'tools' => [
            'settings' => env('TGN_VIEW_TOOL_SETTING', 'tools.settings'),
            'custom_event_action' => env('TGN_VIEW_TOOL_CUSTOM_EVENT_ACTION', 'tools.custom_event_action'),
            'custom_event' => env('TGN_VIEW_TOOL_CUSTOM_EVENT', 'tools.custom_event'),
            'set_menu_cmd' => env('TGN_VIEW_TOOL_SET_MENU_COMMAND', 'tools.set_menu_cmd'),
        ],
    ],
];
