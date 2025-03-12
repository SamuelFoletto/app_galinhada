<?php
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::resource('/cliente', App\Http\Controllers\ClienteController::class)->middleware('auth');
    Route::resource('/produto', App\Http\Controllers\ProdutoController::class);
    Route::get('/pedidos/cliente/{id}', [PedidoController::class, 'buscarCliente'])->name('pedidos.cliente');
    Route::get('/pedidos/buscar-cliente', [PedidoController::class, 'buscarClientePorNome'])->name('pedidos.buscarCliente');
    Route::resource('pedido', App\Http\Controllers\PedidoController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/forma_pagamento', App\Http\Controllers\FormaPagamentoController::class);
});

Auth::routes();

