<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => 'a2111f49a46c7a6d1114',
        'client_secret' => '5277af4c33937ea74ad955480c5168bec523fed6',
        'redirect' => 'http://farahty.com/storeuser',
    ],
    'google' => [
        'client_id' => '381784689239-mcdrt5d2f82t1ikuhjuufn22r6kgr2tp.apps.googleusercontent.com',
        'client_secret' => 'CAUr95_HPJAPEYliuMoPeQbW',
        'redirect' => 'http://farahty.com/storeuser',
    ],
    'facebook' => [
        'client_id' => '1053890594693247',
        'client_secret' => '7feb6bbb506f77af5b24a8cd4463d626',
        'redirect' => 'http://farahty.com/storeuser',
    ],
    'twitter' => [
        'client_id' => 'TWxwgZ1OuZX95g9SLTtnRSI0H',
        'client_secret' => 'JYIscK8RVHS7tqOsSQ5VMaCxIIYhEMRqG58WXiczQV25A1It5V',
        'redirect' => 'http://farahty.com/storeuser',
    ],

];
