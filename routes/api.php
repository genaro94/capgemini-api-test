<?php

Route::namespace('Api')->prefix('account')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});

Route::namespace('Api')->middleware(['jwt.aut'])->group(function () {
    Route::get('balances', 'AccountController@balance');
    Route::post('withdraws', 'AccountController@withdraw');
    Route::post('deposits', 'AccountController@deposit');
});
