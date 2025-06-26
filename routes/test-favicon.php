<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-favicon', function () {
    return view('test-favicon');
});
