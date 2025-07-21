<?php

return [
    'source' => storage_path('app/public'),
    'cache' => storage_path('app/glide-cache'),
    'base_url' => 'http://127.0.0.1:8000',
    'route' => 'image',
    'cache_path_prefix' => 'cache',

     /*
    |--------------------------------------------------------------------------
    | Set complicated sign key
    |--------------------------------------------------------------------------
    |
    | We recommend using a 128 character (or larger) signing key to prevent trivial key attacks. Consider using a package like CryptoKey to generate a secure key.
    |
    */
    'sign_key' => env('HOAVI_GLIDE_SIGN_KEY', '0Fkb3;fa@"[./QmAxo\-Va!Y6dPXKmfIZi8?vBce*qxRI}AyvED4At6|3Pik;680Dhst7/ABHUcq4xVm+eXmCR.q9LisYC7F;xckj#.HZyDOW)F.Z{c,-4@]E8:FXO6y'), // Ký hiệu bảo mật nếu có

    'defaults' => [
        'q' => 100,  // Chất lượng ảnh mặc định
        'fm' => 'webp', // Format mặc định
    ],

    'allowed_sizes' => [
        [300, 200],
        [600, 400],
        [1200, 800],
    ],
];
