<?php
    Route::group(['prefix' => '/dashboard'], function() {
        Route::middleware(['guest'])->group(function () {
            Route::get('/login', 'UserSessionController@create')->name('login');
            Route::post('/login', 'UserSessionController@store');

            Route::get('/register', 'UnRegisteredUserController@create')->name('register');
            Route::post('/register', 'UnRegisteredUserController@store');
        });
        Route::middleware(['auth'])->group(function () {
            Route::get('/', 'PasswordController@index')->name('dashboard.index');

            Route::post('/passwords/search', 'PasswordController@search');
            Route::resource('passwords', 'PasswordController'); 
            Route::resource('categories', 'CategoryController'); 

            Route::get('/profile/logout', 'UserSessionController@destroy')->name('logout');
        });
    });
