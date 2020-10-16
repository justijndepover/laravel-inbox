<?php

use Justijndepover\Inbox\Controllers\EmailController;
use Justijndepover\Inbox\Middleware\Authorize;

Route::middleware(config('inbox.middleware'))->middleware(Authorize::class)->group(function () {
    Route::get(config('inbox.path') . '/{id?}', [EmailController::class, 'index'])->name('inbox');
});