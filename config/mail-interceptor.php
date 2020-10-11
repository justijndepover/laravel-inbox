<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail interceptor Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Mail interceptor will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => 'mails',

    /*
    |--------------------------------------------------------------------------
    | Mail interceptor Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached onto each Mail interceptor route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => ['web'],
];