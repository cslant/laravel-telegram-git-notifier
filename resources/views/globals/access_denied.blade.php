<?php
/**
 * @var $chatId string
 */

$message = '🔒 <b>Access Denied to Bot</b> 🚫';

if (!empty($chatId)) {
    $message .= "\n\n🛑 <b>Chat ID:</b> <code>{$chatId}</code> \n";
}

$message .= 'Please contact the administrator for further information, Thank You..';

echo $message;
