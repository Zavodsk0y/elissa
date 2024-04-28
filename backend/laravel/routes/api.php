<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\User\EmailVerificationController;
use App\Http\Controllers\User\EnterReferralCodeController;
use App\Http\Controllers\User\GenereateReferralCodeController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegistrationUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signup', RegistrationUserController::class);
Route::post('/login', LoginUserController::class);

Route::resource('/news', NewsController::class);

Route::resource('/category', CategoryController::class);

Route::get('/email/verify/{user}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/referral', GenereateReferralCodeController::class);
    Route::post('/refer', EnterReferralCodeController::class);
});
