<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos', [PedidosController::class, 'index'])->name('Pedidos.index');

Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');

Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedores.index');

Route::get('/estoques', [EstoquesController::class, 'index'])->name('estoques.index');

Route::get('/produtos', [ProdutosController::class, 'index'])->name('Produtos.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
