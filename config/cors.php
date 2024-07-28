<?php

return [
    'paths' => [
        '*',
        'api/*',
        'login',
        'logout',
        'register',
        'user/password',
        'forgot-password',
        'reset-password',
        'sanctum/csrf-cookie',
        'user/profile-information',
        'email/verification-notification',
    ],

    'allowed_methods' => ['*'], // Разрешить все методы (GET, POST и т.д.)

    'allowed_origins' => ['*'], // Разрешить все источники (домен)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Разрешить все заголовки

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
