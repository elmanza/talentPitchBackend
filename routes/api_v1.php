<?php

use Illuminate\Support\Facades\Route;

Route::prefix('role')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

Route::prefix('main-goal')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

Route::prefix('achievement')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

Route::prefix('audience-category')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

Route::prefix('audience')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

Route::prefix('language')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});


Route::prefix('users')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');

    Route::prefix('achievement')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });

    Route::prefix('audience')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });
});

Route::prefix('challenge')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');

    Route::prefix('participant')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });

    Route::prefix('judge')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });
});

Route::prefix('video')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');

    Route::prefix('challenge')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });

    Route::prefix('challenge-rate')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });

    Route::prefix('like')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::delete('/{id}', 'UserController@destroy');
    });
});
