<?php

return [
    'completed' => [
        'success' => [
            'title' => '🎉 <b>Workflow Completed</b> from 🦑 :repo',
            'body' => 'Done workflow: 🎉 <b>:name</b> ✨ ',
        ],
        'failure' => [
            'title' => '🚫 <b>Workflow Failed</b> from 🦑:repo',
            'body' => 'Failed workflow: 🚫 <b>:name</b> ❌',
        ],
        'cancelled' => [
            'title' => '❌ <b>Workflow Cancelled</b> from 🦑 :repo',
            'body' => 'Cancelled workflow: 🚨 <b>:name</b> ❌ ',
        ],
        'default' => [
            'title' => "🚨 <b>Workflow Can't Success</b> from 🦑:repo",
            'body' => "Can't Success workflow: 🚨 <b>:name</b> ❌",
        ],
    ],
    'requested' => [
        'title' => ' <b>Workflow Requested</b> from 🦑:repo',
        'body' => 'Running workflow: 💥 <b>:name</b> ⏳',
    ],
    'link' => '🔗 Workflow run link: :link',
];
