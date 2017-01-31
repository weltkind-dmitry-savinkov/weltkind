<?php
return [

    //file field
    'image' => [

        'path' => '/uploads/clients/',

        'validator' => 'mimes:jpeg,jpg,png|max:10000',

        //Model field
        'field' => 'image',

        'thumbs' => [
            [
                'path' => 'full/',
                'width' => 150,
                'height' => false,
                'full' => true
            ],

            [
                'path' => 'mini/',
                'width' => 85,
                'height' => false,
                'thumb' => true
            ]
        ]

    ]

];