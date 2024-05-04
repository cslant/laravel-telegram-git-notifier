<?php

return [
    'completed' => [
        'success' => [
            'title' => '🎉 <b>Workflow Completed</b> from 🦑 :repo',
            'body' => 'Done workflow: 🎉 <b><code>:name</code></b> ✨ ',
        ],
        'failure' => [
            'title' => '🚫 <b>Workflow Failed</b> from 🦑:repo',
            'body' => 'Failed workflow: 🚫 <b><code>:name</code></b> ❌',
        ],
        'cancelled' => [
            'title' => '❌ <b>Workflow Cancelled</b> from 🦑 :repo',
            'body' => 'Cancelled workflow: 🚨 <b><code>:name</code></b> ❌ ',
        ],
        'default' => [
            'title' => "🚨 <b>Workflow Can't Success</b> from 🦑:repo",
            'body' => "Can't Success workflow: 🚨 <b><code>:name</code></b> ❌",
        ],
    ],
    'requested' => [
        'title' => ' <b>Workflow Requested</b> from 🦑:repo',
        'body' => 'Running workflow: 💥 <b><code>:name</code></b> ⏳',
    ],
    'link' => 'Workflow run link: :link',
    'display_title' => 'Title',
];
