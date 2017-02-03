<?php
return [

    'groups' => [
        ['title' => 'Тарифы', 'slug' => 'tariffs', 'icon' => 'fa-usd', 'priority' => 2]
    ],

    'items' => [
        ['icon' => 'fa-star-o', 'group'=>'tariffs', 'route' => 'admin.tariffs.index', 'title' => 'Список тарифов'],
        ['icon' => 'fa-file-text-o', 'group'=>'tariffs', 'route' => 'admin.tariffscategories.index', 'title' => 'Список категорий']

    ]

];

