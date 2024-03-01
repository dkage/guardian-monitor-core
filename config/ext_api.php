<?php

return [

    /*
    |--------------------------------------------------------------------------
    | External API's Configuration
    |--------------------------------------------------------------------------
    |
    | Config file for external API's data like URL, API key, etc.
    |
    */

    'todoist' => [
        'url'      => env('TODOIST_API_URL'),
        'client'   => env('TODOIST_CLIENT_ID'),
        'secret'   => env('TODOIST_CLIENT_SECRET'),
        'verify'   => env('TODOIST_VERIFICATION_TOKEN'),
        'redirect' => env('TODOIST_REDIRECT_URI'),
    ],

    'google' => [
        'url'      => env('GOOGLE_API_URL'),
        'client'   => env('GOOGLE_CLIENT_ID'),
        'secret'   => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
//        'verify'   => env('GOOGLE_VERIFICATION_TOKEN'),
    ],

    'state_token' => env('STATE_TOKEN'),

];
