<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', '\App\Http\Controllers\AuthController@login');
    Route::post('logout', '\App\Http\Controllers\AuthController@logout');
    Route::post('refresh', '\App\Http\Controllers\AuthController@refresh');
    Route::post('me', '\App\Http\Controllers\AuthController@me');
});

Route::middleware(['jwt.auth'])->group(function () {
});
    Route::apiResources([
        'polls' => \App\Http\Controllers\Api\PollController::class,
        'questions' => \App\Http\Controllers\Api\QuestionController::class,
        'options_question' => \App\Http\Controllers\Api\OptionsQuestionController::class,
        'user_answers' => \App\Http\Controllers\Api\UserAnswersController::class,
    ]);

