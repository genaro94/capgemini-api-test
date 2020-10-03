<?php

Route::group(['prefix' => 'account', 'namespace' => 'Api\\'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});
