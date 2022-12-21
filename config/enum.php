<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Enum
    |--------------------------------------------------------------------------
    |
    */
    
    'farm' => [
        'gender' => [
            'jantan' => 'jantan',
            'betina' => 'betina'
        ],
        'status' => [
            'hidup' => 'hidup',
            'mati' => 'mati',
            'terjual' => 'terjual',
            'hilang' => 'hilang'
        ]
    ],
    'medical' => [
        'age' => [
            '0-2' => '0-2',
            '2-4' => '2-4',
            '4-6' => '4-6',
            '6-8' => '6-8',
            '8-10' => '8-10',
            '10-12' => '10-12',
            '12-18' => '12-18'
        ],
        'status' => [
            'hidup' => 'hidup',
            'mati' => 'mati',
            'terjual' => 'terjual',
            'hilang' => 'hilang'
        ]
    ],
    'role' => [
        'guard' => [
            'web' => 'web',
            'api' => 'api'
        ]
    ],
    'menu' => [
        'type' => [
            'parent' => 'parent',
            'single' => 'single'
        ]
    ]
];