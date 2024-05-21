<?php

return [
    'issue_title' => '📢',
    'default' => 'Default issue to :issue by :user',
    'confidential_issue' => '🔒 <b>Confidential Issue</b> to :issue by :user',
    'closed' => [
        'title' => '<b>Issue Closed </b> to :issue by :user',
    ],
    'edited' => [
        'title' => '<b>Issue has been edited</b> to :issue by :user',
        'changes' => [
            'title' => [
                'name' => '<b>Title</b> has been changed',
                'from' => '<b>From:</b> :title_from',
                'to' => '<b>To:</b> :title_to',
            ],
            'body' => [
                'title' => '<b>Body</b> has been changed',
                'message' => 'Please check the issue for more details',
            ],
        ],
    ],
    'opened' => [
        'title' => '<b>New Issue</b> to :issue by :user',
    ],
    'reopened' => [
        'title' => '<b>Issue has been reopened</b> :issue by :user',
    ],
];
