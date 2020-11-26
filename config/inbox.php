<?php

return [

    /*
     * This setting determines if the Laravel Inbox package should Listen
     * to Sending mail events.
     */
    'listener_enabled' => (config('app.env') != 'production'),

    /*
     * This setting determines if the Laravel Inbox package should open up
     * the endpoint to view the inbox application.
     */
    'application_enabled' => (config('app.env') != 'production'),

    /*
     * This is the URI path where Laravel Inbox will be accessible from.
     */
    'path' => 'inbox',

    /*
     * These middleware will get attached onto each Laravel Inbox route, giving you
     * the chance to add your own middleware to this list or change any of
     * the existing middleware. Or, you can simply stick with this list.
     */
    'middleware' => ['web'],

];
