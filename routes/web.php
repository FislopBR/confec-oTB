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
  //Aula05  
// Rota para mostrar o formulário
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');

// Rota para RECEBER os dados e salvar (POST)
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');

// Rota para mostrar o formulário
Route::get('/estoques/create', [EstoquesController::class, 'create'])->name('estoques.create');

// Rota para RECEBER os dados e salvar (POST)
Route::post('/estoques', [EstoquesController::class, 'store'])->name('estoques.store');

Route::get('/fornecedores/create', [FornecedoresController::class, 'create'])->name('fornecedores.create');

// Rota para RECEBER os dados e salvar (POST)
Route::post('/fornecedores', [FornecedoresController::class, 'store'])->name('fornecedores.store');

Route::get('/Produtos/create', [ProdutosController::class, 'create'])->name('produtos.create');

// Rota para RECEBER os dados e salvar (POST)
Route::post('/Produtos', [ProdutosController::class, 'store'])->name('produtos.store');

       Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
