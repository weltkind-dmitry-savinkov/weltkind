<?php
return [

    //file field
    'main_image' => [

        'path' => '/uploads/portfolio/',

        'validator' => 'mimes:jpeg,jpg,png|max:10000',
        //Model field
        'field' => 'main_image',

        'thumbs' => [
            [
                'path' => 'main/',
                'width' => 299,
                'height' => 264,
                'thumb' => true
            ]
        ]
    ],

    'image' =>[
        'path' => '/uploads/portfolio/',

        'validator' => 'mimes:jpeg,jpg,png|max:10000',
        //Model field
        'field' => 'image',

        'thumbs' => [
            [
                'path' => 'full/',
                'width' => 900,
                'height' => false,
                'full' => true
            ],

            [
                'path' => 'thumb/',
                'width' => 600,
                'height' => false,
            ],

            [
                'path' => 'mini/',
                'width' => 130,
                'height' => false,
                'thumb' => true
            ],


        ]

    ]

];