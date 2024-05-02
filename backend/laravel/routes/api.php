<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\UpdateOrderStatusController;
use App\Http\Controllers\Part\PartController;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Request\UpdateRequestStatusController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\User\ChangeEmailAndPasswordController;
use App\Http\Controllers\User\EmailVerificationController;
use App\Http\Controllers\User\EnterReferralCodeController;
use App\Http\Controllers\User\GenereateReferralCodeController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegistrationUserController;
use App\Http\Controllers\User\VkontakteAuthenticationController;
use App\Http\Middleware\EnsureVerifiedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signup', RegistrationUserController::class);
Route::post('/login', LoginUserController::class);

Route::get('auth/vk', [VkontakteAuthenticationController::class, 'redirectToVk']);
Route::get('auth/vk/callback', [VkontakteAuthenticationController::class, 'handleVkCallback']);


Route::resource('/categories', CategoryController::class);

Route::resource('/parts', PartController::class);

Route::resource('/services', ServiceController::class);

Route::get('/email/verify/{user}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

Route::group(['middleware' => ['auth:sanctum', EnsureVerifiedEmail::class]], function () {
    Route::post('/users/credentials', ChangeEmailAndPasswordController::class);

    Route::post('/cart/{part}', [CartController::class, 'addToCart']);
    Route::delete('/cart/{part}', [CartController::class, 'removeFromCart']);
    Route::get('/cart', [CartController::class, 'index']);

    Route::resource('/news', NewsController::class);

    Route::resource('requests', RequestController::class)->except('update');
    Route::patch('/requests/{request}', UpdateRequestStatusController::class);

    Route::resource('orders', OrderController::class)->except('update');
    Route::patch('/orders/{order}', UpdateOrderStatusController::class);


    Route::post('/referral', GenereateReferralCodeController::class);
    Route::post('/refer', EnterReferralCodeController::class);
});
