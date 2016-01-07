<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Credentials
    |--------------------------------------------------------------------------
    |
    | Required credentials for the PubNub app, you wish to interact with.
    |
    */
    'credentials' => [
        'publish_key' => env('PUBNUB_PUBLISH_KEY'),
        'subscribe_key' => env('PUBNUB_SUBSCRIBE_KEY'),
        'secret_key' => env('PUBNUB_SECRET_KEY')
    ],

    /*
    |--------------------------------------------------------------------------
    | SSL mode
    |--------------------------------------------------------------------------
    |
    | All communication should be done via a secure connection.
    |
    */
    'ssl' => true
];