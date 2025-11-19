<?php
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::resource('/cliente', App\Http\Controllers\ClienteController::class)->middleware('auth');
    Route::resource('/produto', App\Http\Controllers\ProdutoController::class);
    Route::get('/pedidos/cliente/{id}', [PedidoController::class, 'buscarClientePorId']);
    Route::get('/pedidos/buscar-cliente', [PedidoController::class, 'buscarClientePorNome']);
    Route::resource('pedido', App\Http\Controllers\PedidoController::class);
    Route::put('/pedidos/{pedido}/status', [PedidoController::class, 'updateStatus'])->name('pedido.updateStatus');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/forma_pagamento', App\Http\Controllers\FormaPagamentoController::class);
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
