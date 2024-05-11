<?php

return [
    'name' => 'Rule Name',
    'created' => [
        'title' => '<b>New Branch Protection Rules</b> from :repo',
        'link' => 'Link: :link',
    ],
    'edited' => [
        'title' => '<b>Branch Protection Rules Have Been Edited</b> from :repo',
        'changes' => [
            'title' => [
                'name' => '<b>The Name</b> has been changed',
                'from' => '<b>From:</b> :title_from',
                'to' => '<b>To:</b> :title_to',
            ],
        ],
        'link' => 'Link: :link',
    ],
    'deleted' => [
        'title' => '<b>Branch Protection Rules Deleted</b> from :repo',
    ],
];
