<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use SpaceApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'middleware' => [
        ApiExceptionMiddleware::class
    ]
], function () {
    $placeholder = 'fallbackPlaceholder';

    $allowedMethods = collect(explode(',', config('spaceapi.routefallback::methods')));
    $allowedMethods->each(function ($item, $key) use (&$allowedMethods) {
        $allowedMethods[$key] = strtoupper(trim($item));
    });

    Route::addRoute(
        $allowedMethods->toArray(), "{{$placeholder}}", function () {
            throw new NotFoundHttpException('Route not found');
        }
    )->where($placeholder, '.*')->fallback();
});

