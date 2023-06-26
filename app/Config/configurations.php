<?php

return [
    'db' => [
        'host' => getenv('DB_HOST') ?? null,
        'database' => getenv('DB_NAME') ?? null,
        'user' => getenv('DB_USER') ?? null,
        'password' => getenv('DB_PASSWORD') ?? null
    ],
    'info' => [
        'name' => 'E-DIGITAL',
        'email' => 'request@e-digital.com.ua',
        'telephone' => '+380666653490',
        'address' => 'Якась там адреса',
        'additional_text' => 'Безкоштовна доставка від 10000000₴'
    ]
];
