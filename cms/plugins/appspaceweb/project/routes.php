<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use AppSpaceWeb\Project\Http\Controllers\ProjectsController;

Route::group([
    'prefix' => 'api/v1',

], function (Router $router) {
    $router->get('projects', [ProjectsController::class, 'index']);
});
