<?php

return [
    'github' => [
        'title' => '<b>Adding webhook (Web Address) to GitHub repositories</b> 🦑',
        'webhookSetupSteps' => [
            '1) Redirect to <i>Repository Settings->Webhooks->Add Webhook</i>.',
            '2) Set your Payload URL.',
            '3) Set content type to \"<code>application/x-www-form-urlencoded</code>\".',
            '4) Choose events you would like to trigger in this webhook. (Recommended: <code>Let me select individual events</code>, and choose any events you want).',
            '5) Check <code>Active</code> checkbox. And click <code>Add Webhook</code>.',
        ],
    ],
    'gitlab' => [
        'title' => '<b>Adding webhook (Web Address) to GitLab repositories</b> 🦊',
        'webhookSetupSteps' => [
            '1) Redirect to <i>Repository Settings->Webhooks->Add new webhook</i>.',
            '2) Set your Payload URL.',
            '3) Choose events you would like to trigger in this webhook.',
            '4) Check <code>Enable SSL verification</code> if you are using SSL. And click <code>Add Webhook</code>.',
        ],
    ],
    'completionMessage' => '<b>That it. you will receive all notifications through me 🤗</b>',
];
