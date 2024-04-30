<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Part\PartController;
use App\Http\Controllers\User\ChangeEmailAndPasswordController;
use App\Http\Controllers\User\EmailVerificationController;
use App\Http\Controllers\User\EnterReferralCodeController;
use App\Http\Controllers\User\GenereateReferralCodeController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegistrationUserController;
use App\Http\Controllers\User\VkontakteAuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signup', RegistrationUserController::class);
Route::post('/login', LoginUserController::class);

Route::get('auth/vk', [VkontakteAuthenticationController::class, 'redirectToVk']);
Route::get('auth/vk/callback', [VkontakteAuthenticationController::class, 'handleVkCallback']);

Route::resource('/news', NewsController::class);

Route::resource('/categories', CategoryController::class);

Route::resource('/parts', PartController::class);

Route::get('/email/verify/{user}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users/credentials', ChangeEmailAndPasswordController::class);

    Route::post('/cart/{part}', [CartController::class, 'addToCart']);
    Route::delete('/cart/{part}', [CartController::class, 'removeFromCart']);
    Route::get('/cart', [CartController::class, 'index']);

    Route::post('/order', [OrderController::class, 'store']);


    Route::post('/referral', GenereateReferralCodeController::class);
    Route::post('/refer', EnterReferralCodeController::class);
});
