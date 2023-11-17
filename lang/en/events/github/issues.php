<?php

return [
    'issue_title' => '📢',
    'closed' => [
        'title' => '🚫 <b>Issue Closed </b> to 🦑 :issue by :user',
    ],
    'deleted' => [
        'title' => '🗑 <b>Issue Deleted</b> form 🦑 :issue by :user',
    ],
    'edited' => [
        'title' => '⚠️ <b>Issue has been edited</b> to 🦑 :issue by :user',
        'changes' => [
            'title' => [
                'name' => '📖 <b>Title</b> has been changed',
                'from' => '📝 <b>From:</b> :title_from',
                'to' => '🏷 <b>To:</b> :title_to',
            ],
            'body' => [
                'title' => '📖 <b>Body</b> has been changed',
                'message' => 'Please check the issue for more details',
            ],
        ],
    ],
    'locked' => [
        'title' => '🔒 <b>Issue Locked</b> form 🦑 :issue by :user',
    ],
    'opened' => [
        'title' => '⚠️ <b>New Issue</b> to 🦑 :issue by :user',
    ],
    'pinned' => [
        'title' => '📌 <b>Issue Pinned</b> form 🦑 :issue by :user',
    ],
    'reopened' => [
        'title' => '⚠️ <b>Issue has been reopened</b> ⚠️ to 🦑 :issue by :user',
    ],
    'unlocked' => [
        'title' => '🔐 <b>Issue Unlocked</b> form 🦑 :issue by :user',
    ],
    'unpinned' => [
        'title' => '🔔 <b>Issue Unpinned</b> form 🦑 :issue by :user',
    ],
];
