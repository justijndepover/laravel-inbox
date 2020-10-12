<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel Inbox Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Laravel Inbox will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => 'inbox',

    /*
    |--------------------------------------------------------------------------
    | Laravel Inbox Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached onto each Laravel Inbox route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => ['web'],
];