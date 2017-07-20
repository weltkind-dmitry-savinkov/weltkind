<?php


return [
    'groups' => [
        [
            'title' => 'Пользователи',
            'slug' => 'users',
            'icon' => 'fa-users',
            'priority' => 100
        ],
        [
            'title' => 'Содержание',
            'slug' => 'content',
            'icon' => 'fa-file',
            'priority' => 99
        ],
        [
            'title' => 'Модули',
            'slug' => 'modules',
            'icon' => 'fa-file',
            'priority' => 98
        ]
    ],

    'items' => [
        [
            'icon' => 'fa-photo',
            'group' => 'content',
            'route' => 'admin.files.images',
            'priority' => -100,
            'title' => 'Изображения',
            'slug' => 'images'
        ],
        [
            'icon' => 'fa-files-o',
            'group' => 'content',
            'route' => 'admin.files.files',
            'priority' => -100,
            'title' => 'Файлы',
            'slug' => 'files'
        ]
    ]


];
