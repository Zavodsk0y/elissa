<?php

use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegistrationUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signup', RegistrationUserController::class);

Route::resource('/news', NewsController::class);
