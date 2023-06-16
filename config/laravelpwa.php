<?php

return [
    'name' => 'Rec.ipe',
    'manifest' => [
        'name' => env('Rec.ipe', 'Rec.ipe'),
        'short_name' => 'Rec.ipe',
        'start_url' => '/rec.ipe',
        'background_color' => '#6777ef',
        'theme_color' => '#6777ef',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '20x20' => [
                'path' => '/images/icons/AppIcon20x20.png',
                'purpose' => 'any'
            ],
            '29x29' => [
                'path' => '/images/icons/AppIcon29x29.png',
                'purpose' => 'any'
            ],
            '32x32' => [
                'path' => '/images/icons/AppIcon32x32.png',
                'purpose' => 'any'
            ],
            '40x40' => [
                'path' => '/images/icons/AppIcon40x40.png',
                'purpose' => 'any'
            ],
            '58x58' => [
                'path' => '/images/icons/AppIcon58x58.png',
                'purpose' => 'any'
            ],
            '60x60' => [
                'path' => '/images/icons/AppIcon60x60.png',
                'purpose' => 'any'
            ],
            '76x76' => [
                'path' => '/images/icons/AppIcon76x76.png',
                'purpose' => 'any'
            ],
            '80x80' => [
                'path' => '/images/icons/AppIcon80x80.png',
                'purpose' => 'any'
            ],
            '120x120' => [
                'path' => '/images/icons/AppIcon120x120.png',
                'purpose' => 'any'
            ],
            '76x76' => [
                'path' => '/images/icons/AppIcon76x76.png',
                'purpose' => 'any'
            ],
            '180x180' => [
                'path' => '/images/icons/AppIcon180x180.png',
                'purpose' => 'any'
            ],
            '1024x1024' => [
                'path' => '/images/icons/AppIcon1024x1024.png.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '200x320' => '/public/images/icons/200x320.png',
            '828x1792' => '/public/images/icons/828x1792.png',
            '960x1600' => '/public/images/icons/960x1600.png',
            '1125x2436' => '/public/images/icons/1125x2436.png',
            '1242x2208' => '/public/images/icons/1242x2208.png',
            '1242x2688' => '/public/images/icons/1242x2688.png',
            '128x1920' => '/public/images/icons/128x1920.png',
            '1536x2008' => '/public/images/icons/1536x2008.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
