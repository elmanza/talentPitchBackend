<?php

use Illuminate\Support\Facades\Route;

Route::prefix('role')->group(function(){
    Route::get('/', 'RoleController@index');
    Route::get('/{id}', 'RoleController@show');
    Route::post('/', 'RoleController@store');
    Route::put('/{id}', 'RoleController@update');
    Route::delete('/{id}', 'RoleController@destroy');
});

Route::prefix('main-goal')->group(function(){
    Route::get('/', 'MainGoalController@index');
    Route::get('/{id}', 'MainGoalController@show');
    Route::post('/', 'MainGoalController@store');
    Route::put('/{id}', 'MainGoalController@update');
    Route::delete('/{id}', 'MainGoalController@destroy');
});

Route::prefix('achievement')->group(function(){
    Route::get('/', 'AchievementController@index');
    Route::get('/{id}', 'AchievementController@show');
    Route::post('/', 'AchievementController@store');
    Route::put('/{id}', 'AchievementController@update');
    Route::delete('/{id}', 'AchievementController@destroy');
});

Route::prefix('audience-category')->group(function(){
    Route::get('/', 'AudienceCategoryController@index');
    Route::get('/{id}', 'AudienceCategoryController@show');
    Route::post('/', 'AudienceCategoryController@store');
    Route::put('/{id}', 'AudienceCategoryController@update');
    Route::delete('/{id}', 'AudienceCategoryController@destroy');
});

Route::prefix('audience')->group(function(){
    Route::get('/', 'AudienceController@index');
    Route::get('/{id}', 'AudienceController@show');
    Route::post('/', 'AudienceController@store');
    Route::put('/{id}', 'AudienceController@update');
    Route::delete('/{id}', 'AudienceController@destroy');
});

Route::prefix('language')->group(function(){
    Route::get('/', 'LanguageController@index');
    Route::get('/{id}', 'LanguageController@show');
    Route::post('/', 'LanguageController@store');
    Route::put('/{id}', 'LanguageController@update');
    Route::delete('/{id}', 'LanguageController@destroy');
});


Route::prefix('users')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');

    Route::prefix('achievement')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@userAchievementStore');
        Route::delete('/{id}', 'UserController@destroy');
    });

    Route::prefix('audience')->group(function(){
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@userAudienceStore');
        Route::delete('/{id}', 'UserController@destroy');
    });
});

Route::prefix('challenge')->group(function(){
    Route::get('/', 'ChallengeController@index');
    Route::get('/{id}', 'ChallengeController@show');
    Route::post('/', 'ChallengeController@store');
    Route::put('/{id}', 'ChallengeController@update');
    Route::delete('/{id}', 'ChallengeController@destroy');

    Route::prefix('participant')->group(function(){
        Route::get('/{id}', 'ChallengeController@show');
        Route::post('/', 'ChallengeController@challengeParticipantsStore');
        Route::delete('/{id}', 'ChallengeController@destroy');
    });

    Route::prefix('judge')->group(function(){
        Route::get('/{id}', 'ChallengeController@show');
        Route::post('/', 'ChallengeController@challengeJudgeStore');
        Route::delete('/{id}', 'ChallengeController@destroy');
    });
});

Route::prefix('video')->group(function(){
    Route::get('/', 'VideoController@index');
    Route::get('/{id}', 'VideoController@show');
    Route::post('/', 'VideoController@store');
    Route::put('/{id}', 'VideoController@update');
    Route::delete('/{id}', 'VideoController@destroy');

    Route::prefix('challenge')->group(function(){
        Route::get('/{id}', 'VideoController@show');
        Route::post('/', 'VideoController@videoChallengeStore');
        Route::delete('/{id}', 'VideoController@destroy');
    });

    Route::prefix('challenge-rate')->group(function(){
        Route::get('/{id}', 'VideoController@show');
        Route::post('/', 'VideoController@videoChallengeRateStore');
        Route::delete('/{id}', 'VideoController@destroy');
    });

    Route::prefix('like')->group(function(){
        Route::get('/{id}', 'VideoController@show');
        Route::post('/', 'VideoController@videoLikesStore');
        Route::delete('/{id}', 'VideoController@destroy');
    });
});
