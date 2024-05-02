<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            throw new \App\Exceptions\Shared\NotFoundException();
        });

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException $e, $request) {
           throw new \App\Exceptions\Shared\UnauthorizedException();
        });

        $exceptions->render(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
           throw new \App\Exceptions\Shared\UnauthorizedException();
        });

        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            throw new \App\Exceptions\Shared\UnauthenticatedException();
        });

        $exceptions->render(function (\TypeError $error, $request) {
           throw new \App\Exceptions\Shared\ValidationFailedException();
        });
    })->create();
