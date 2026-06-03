<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('clientes', ClienteController::class);
    Route::resource('fornecedores', FornecedoresController::class);
    Route::resource('estoques', EstoquesController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('pedidos', PedidoController::class);
});

require __DIR__.'/auth.php';