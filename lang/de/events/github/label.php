<?php

return [
    'created' => [
        'title' => '💬 <b>New Label</b> ⚠️ - 🦑:repo by :user',
    ],
    'deleted' => [
        'title' => '🗑 <b>Label Deleted</b> - 🦑:repo by :user',
    ],
    'edited' => [
        'title' => '👷‍♂️🛠️ <b>Label has been edited</b> - 🦑:repo by :user',
        'changes' => [
            'title' => [
                'name' => '📖 <b>Title</b> has been changed',
                'from' => '📝 <b>From:</b> :title_from',
                'to' => '🏷 <b>To:</b> :title_to',
            ],
            'description' => [
                'name' => '📖 <b>Description</b> has been changed',
                'from' => '📝 <b>From:</b> :description_from',
                'to' => '🏷 <b>To:</b> :description_to',
            ],
        ],
    ],
];
