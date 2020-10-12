<?php

use Justijndepover\Inbox\Controllers\EmailController;

Route::group(['middleware' => config('inbox.middleware')], function () {
    Route::get(config('inbox.path') . '/{id?}', [EmailController::class, 'index'])->name('inbox');
});