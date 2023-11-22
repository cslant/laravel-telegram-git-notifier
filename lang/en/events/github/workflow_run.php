<?php

return [
    'completed' => [
        'success' => [
            'title' => '🎉 <b>Workflow Completed</b> form 🦑 :user',
            'body' => 'Done workflow: 🎉 <b>:name</b> ✨ ',
        ],
        'failure' => [
            'title' => '🚫 <b>Workflow Failed</b> form 🦑:user',
            'body' => 'Failed workflow: 🚫 <b>:name</b> ❌',
        ],
        'cancelled' => [
            'title' => '❌ <b>Workflow Cancelled</b> form 🦑 :user',
            'body' => 'Cancelled workflow: 🚨 <b>:name</b> ❌ ',
        ],
        'default' => [
            'title' => "🚨 <b>Workflow Can't Success</b> form 🦑:user",
            'body' => "Can't Success workflow: 🚨 <b>:name</b> ❌",
        ],
    ],
    'requested' => [
        'title' => ' <b>Workflow Requested</b> form 🦑:user',
        'body' => 'Running workflow: 💥 <b>:name</b> ⏳',
    ],
    'link' => '🔗 Link: :link',
];
