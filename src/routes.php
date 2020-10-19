<?php

use Justijndepover\Inbox\Controllers\EmailController;
use Justijndepover\Inbox\Controllers\EmailApiController;
use Justijndepover\Inbox\Middleware\Authorize;

Route::middleware(config('inbox.middleware'))->group(function () {
    Route::middleware(Authorize::class)->group(function () {
        Route::get(config('inbox.path') . '/{id?}', EmailController::class)->name('inbox');

        Route::get('/inbox-api', [EmailApiController::class, 'index']);
        Route::get('/inbox-api/{email}', [EmailApiController::class, 'show']);
        Route::get('/inbox-api/{email}/template', [EmailApiController::class, 'template']);
    });
});