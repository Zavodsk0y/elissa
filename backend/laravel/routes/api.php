<?php

use App\Http\Controllers\Admin\AssignEmployeeController;
use App\Http\Controllers\Admin\GetOrderHistoryController;
use App\Http\Controllers\Admin\GetRequestHistoryController;
use App\Http\Controllers\Admin\GetUserCartConroller;
use App\Http\Controllers\Admin\GetUserOrdersController;
use App\Http\Controllers\Admin\GetUserRequestsConroller;
use App\Http\Controllers\Admin\UnsignEmployeeController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\UpdateOrderStatusController;
use App\Http\Controllers\Part\PartController;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Request\UpdateRequestStatusController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\User\AbouteMeController;
use App\Http\Controllers\User\ChangeEmailAndPasswordController;
use App\Http\Controllers\User\EmailVerificationController;
use App\Http\Controllers\User\EnterReferralCodeController;
use App\Http\Controllers\User\GenereateReferralCodeController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegistrationUserController;
use App\Http\Controllers\User\ShowUsersController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\User\UserResetPasswordController;
use App\Http\Controllers\User\VkontakteAuthenticationController;
use App\Http\Middleware\EnsureVerifiedEmail;
use Illuminate\Support\Facades\Route;

Route::post('/signup', RegistrationUserController::class);
Route::post('/login', LoginUserController::class);

Route::get('auth/vk', [VkontakteAuthenticationController::class, 'redirectToVk']);
Route::get('auth/vk/callback', [VkontakteAuthenticationController::class, 'handleVkCallback']);

Route::resource('news', NewsController::class)->only('index', 'show');

Route::resource('categories', CategoryController::class)->only('index', 'show');

Route::resource('parts', PartController::class)->only('index', 'show');

Route::resource('/services', ServiceController::class)->only('index, show');

Route::get('/email/verify/{user}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

Route::post('reset-password', [UserResetPasswordController::class, 'sendEmail']);

Route::get('reset-password', [UserResetPasswordController::class, 'resetPassword'])
    ->middleware('signed')
    ->name('reset-password');

Route::group(['middleware' => ['auth:sanctum', EnsureVerifiedEmail::class]], function () {
    // SET EMAIL & PASSWORD
    Route::post('/users/credentials', ChangeEmailAndPasswordController::class)->withoutMiddleware(EnsureVerifiedEmail::class);

    // USER INFO
    Route::post('/users/resend', [EmailVerificationController::class, 'resendEmail'])->withoutMiddleware(EnsureVerifiedEmail::class);
    Route::post('/users/email-change', [UpdateUserController::class, 'updateEmail'])->withoutMiddleware(EnsureVerifiedEmail::class);
    Route::patch('/users/info-change', [UpdateUserController::class, 'updateInfo'])->withoutMiddleware(EnsureVerifiedEmail::class);
    Route::patch('/users/password-change', [UpdateUserController::class, 'updatePassword'])->withoutMiddleware(EnsureVerifiedEmail::class);


    // ABOUT ME
    Route::get('users/me', AbouteMeController::class)->withoutMiddleware(EnsureVerifiedEmail::class);

    // CART
    Route::post('/cart/{part}', [CartController::class, 'addToCart']);
    Route::delete('/cart/{part}', [CartController::class, 'removeFromCart']);
    Route::get('/cart', [CartController::class, 'index']);

    // NEWS
    Route::resource('news', NewsController::class)->only('store', 'update', 'destroy');

    // CATEGORIES
    Route::resource('categories', CategoryController::class)->only('store', 'update', 'destroy');

    // PARTS
    Route::resource('parts', PartController::class)->only('store', 'update', 'destroy');

    // SERVICES
    Route::resource('services', ServiceController::class)->only('store', 'update', 'destroy');

    // REQUESTS
    Route::resource('requests', RequestController::class)->except('update');
    Route::patch('/requests/{request}', UpdateRequestStatusController::class);

    // ORDERS
    Route::resource('orders', OrderController::class)->except('update');
    Route::patch('/orders/{order}', UpdateOrderStatusController::class);

    // REFERRAL
    Route::post('/referral', GenereateReferralCodeController::class);
    Route::post('/refer', EnterReferralCodeController::class);

    // ADMIN FUNCTIONAL
    Route::post('users/{user}/assign', AssignEmployeeController::class);
    Route::post('users/{user}/unsign', UnsignEmployeeController::class);
    Route::resource('users', ShowUsersController::class)->only('index', 'show');
    Route::get('users/{user}/cart', GetUserCartConroller::class);
    Route::get('users/{user}/orders', GetUserOrdersController::class);
    Route::get('users/{user}/requests', GetUserRequestsConroller::class);
    Route::get('/orders/{order}/history', GetOrderHistoryController::class);
    Route::get('/requests/{request}/history', GetRequestHistoryController::class);
});
