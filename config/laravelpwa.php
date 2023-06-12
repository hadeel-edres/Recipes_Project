<?php

return [
    'name' => 'Rec.ipe',
    'manifest' => [
        'name' => env('APP_NAME', 'Rec.ipe'),
        'short_name' => 'rec.ipe',
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
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
            '1242x2688' => '/images/icons/splash_screen1242x2688',
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
