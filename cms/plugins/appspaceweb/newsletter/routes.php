<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use AppSpaceWeb\Newsletter\Http\Controllers\NewsletterController;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

Route::group([
    'prefix'      => 'api/v1',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api'
    ]
], function (Router $router) {
    $router
        ->post('newsletter/email', [ProjectsController::class, 'store']);
});
