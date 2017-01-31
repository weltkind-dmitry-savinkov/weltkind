<?php


return [

    'groups' => [
        ['title' => 'Портфолио', 'slug' => 'portfolio', 'icon' => 'fa-newspaper-o', 'priority' => 1]
    ],

    'items' => [
        ['icon' => 'fa-internet-explorer', 'group'=>'portfolio', 'route' => 'admin.portfolio.index', 'title' => 'Список работ'],
        ['icon' => 'fa-navicon', 'group'=>'portfolio', 'route' => 'admin.categories.index', 'title' => 'Список категорий']
    ]


];

