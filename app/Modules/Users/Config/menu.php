<?php
return [

    'groups'=>[
        ['title' => 'Администраторы', 'slug'=>'users', 'icon' => 'fa-users', 'priority' => 100]
    ],

    'items' =>[
        ['icon' => 'fa-user', 'group'=>'users', 'route'=>'admin.users.index', 'title' => 'Администраторы'],
    ]

];

