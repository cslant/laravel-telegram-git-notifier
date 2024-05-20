<?php

return [
    'issue_title' => '📢',
    'closed' => [
        'title' => '<b>Vấn đề đã đóng </b> to :issue bởi :user',
    ],
    'edited' => [
        'title' => '<b>Vấn đề đã được chỉnh sửa</b> từ :issue bởi :user',
        'changes' => [
            'title' => [
                'name' => '<b>Tiêu đề</b> đã được thay đổi',
                'from' => '<b>Từ:</b> :title_from',
                'to' => '<b>Đến:</b> :title_to',
            ],
            'body' => [
                'title' => '<b>Nội dung</b> đã được thay đổi',
                'message' => 'Vui lòng kiểm tra vấn đề để biết thêm chi tiết',
            ],
        ],
    ],
    'opened' => [
        'title' => '<b>Vấn đề mới</b> tới :issue bởi :user',
    ],
    'reopened' => [
        'title' => '<b>Vấn đề đã được mở lại</b> :issue bởi :user',
    ],
];
