<?php

return [

    //file field
    'image' => [

        'path' => '/uploads/characters/',

        'validator' => 'mimes:jpeg,jpg,png|max:10000',

        //Model field
        'field' => 'image',

    ]

];
