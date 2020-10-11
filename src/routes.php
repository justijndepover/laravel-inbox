<?php

use Justijndepover\InterceptEmails\Controllers\EmailController;

Route::group(['middleware' => config('mail-interceptor.middleware')], function () {
    Route::get(config('mail-interceptor.path') . '/{id?}', [EmailController::class, 'index'])->name('mail-interceptor');
});