<?php

return [
    'completed' => [
        'completed' => '🎉 <b>Action Completed</b> form :user',
        'done' => 'Done action: 🎉 <b>:runner_name</b> ✨',

        'canceled' => '🚫 <b>Canceled Action</b> form 🦑:user',
        'failed' => 'Failed action: 🚫 <b>:runner_name</b> ❌',
    ],
    'in_progress' => [
        'progress' => '🔧 <b>Action in progress</b> form🦑:user',
        'running' => 'Running action: 💥 <b>:runner_name</b> ⏳',
    ],
    'queued' => [
        'title' => ' <b>Action Queued</b> form 🦑:user',
        'body' => 'Queued action: 💥 <b>:runner_name</b> ⏰',
    ],
    'link' => '🔗 Workflow link: :link',
];
