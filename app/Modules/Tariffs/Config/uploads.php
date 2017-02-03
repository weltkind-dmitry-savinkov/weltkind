<?php

return [

    //file field
    'image' => [

        'path' => '/uploads/tariffs/',

        'validator' => 'mimes:jpeg,jpg,png|max:10000',

        //Model field
        'field' => 'image',

    ]

];
