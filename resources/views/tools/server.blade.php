<?php

use Illuminate\Support\Facades\Request;

$serverAddr = Request::server('SERVER_ADDR');
$serverName = Request::server('SERVER_NAME');
$serverPort = Request::server('SERVER_PORT');
$serverSoftware = Request::server('SERVER_SOFTWARE');
?>

{!! __('tg-notifier::tools/server.address', ['link' => "<a href='{$serverAddr}'>{$serverAddr}</a>"]) !!}
{!! __('tg-notifier::tools/server.name', ['link' => "<a href='{$serverName}'>{$serverName}</a>"]) !!}
{!! __('tg-notifier::tools/server.port', ['link' => "<a href='{$serverPort}'>{$serverPort}</a>"]) !!}
{!! __('tg-notifier::tools/server.software', ['link' => "<a href='{$serverSoftware}'>{$serverSoftware}</a>"]) !!}
