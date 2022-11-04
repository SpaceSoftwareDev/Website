<?php

use Backend\Facades\Backend;

Route::get('/', function () {
    return Backend::redirect('backend');
});
