<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.main');
});

Route::resource('cliente', App\Http\Controllers\ClienteController::class);
