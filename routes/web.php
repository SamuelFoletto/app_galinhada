<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.main');
})->name('site.main');

Route::resource('cliente', App\Http\Controllers\ClienteController::class);

Route::resource('produto', App\Http\Controllers\ProdutoController::class);
