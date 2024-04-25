<?php

use app\Http\Controllers\User\LoginUserController;
use app\Http\Controllers\User\RegistrationUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
