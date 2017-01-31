<?php
return [

    //file field
    'image' => [

        'path' => '/uploads/reviews/',

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
                'path' => 'mini/',
                'width' => 221,
                'height' => false,
                'thumb' => true
            ]
        ]

    ]

];