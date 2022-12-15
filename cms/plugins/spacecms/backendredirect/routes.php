<?php

use Backend\Facades\Backend;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Backend::redirect('backend');
});
