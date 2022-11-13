<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use AppSpaceWeb\Team\Http\Controllers\TeamController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'prefix'     => 'api/v1',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->get('team', [TeamController::class, 'index']);
});
