<?php

use Justijndepover\InterceptEmails\Controllers\EmailController;

Route::group(['middleware' => config('mail-interceptor.middleware')], function () {
    Route::get(config('mail-interceptor.path'), [EmailController::class, 'index']);
    // Route::get(config('mail-interceptor.path').'/email/{id}', 'EmailController@email');
    // Route::get(config('mail-interceptor.path').'/body/{id}', 'EmailController@body');
});