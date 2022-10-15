<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use AppSpaceWeb\Project\Http\Controllers\ProjectsController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'prefix'      => 'api/v1',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->get('projects', [ProjectsController::class, 'index']);
});
