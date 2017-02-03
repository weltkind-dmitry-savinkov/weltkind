<?php


return [
    'groups'=>[
        ['title' => 'Содержание', 'slug'=>'content', 'icon' => 'fa-file', 'priority' => 99],
        ['title' => 'Модули', 'slug'=>'modules', 'icon' => 'fa-puzzle-piece  ', 'priority' => 98]
    ],

    'items' => [
        ['icon' => 'fa-photo', 'group'=>'content', 'route' => 'admin.files.images', 'priority'=>-100, 'title' => 'Изображения'],
        ['icon' => 'fa-files-o', 'group'=>'content', 'route' => 'admin.files.files', 'priority'=>-100, 'title' => 'Файлы']
    ]


];
