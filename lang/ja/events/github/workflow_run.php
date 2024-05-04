<?php

return [
    'completed' => [
        'success' => [
            'title' => '🎉 <b>Workflow Completed</b> from 🦑 :repo',
            'body' => 'Done workflow: 🎉 <code>:name</code> ✨ ',
        ],
        'failure' => [
            'title' => '🚫 <b>Workflow Failed</b> from 🦑:repo',
            'body' => 'Failed workflow: 🚫 <code>:name</code> ❌',
        ],
        'cancelled' => [
            'title' => '❌ <b>Workflow Cancelled</b> from 🦑 :repo',
            'body' => 'Cancelled workflow: 🚨 <code>:name</code> ❌ ',
        ],
        'default' => [
            'title' => "🚨 <b>Workflow Can't Success</b> from 🦑:repo",
            'body' => "Can't Success workflow: 🚨 <code>:name</code> ❌",
        ],
    ],
    'requested' => [
        'title' => ' <b>Workflow Requested</b> from 🦑:repo',
        'body' => 'Running workflow: 💥 <code>:name</code> ⏳',
    ],
    'link' => 'Workflow run link: :link',
    'display_title' => 'Title',
];
