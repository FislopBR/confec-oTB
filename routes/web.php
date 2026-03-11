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



//clientes

Route::middleware(['auth'])->group(function () {
    Route::resource('clients', ClientsController::class);
});


// Rotas para estrutura de clientes para cadastro , edição e exclusão
// Rota para mostrar o formulário
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
// Rota para editar os dados
Route::get('/clients/edit', [ClientsController::class, 'edit'])->name('clients.edit');
Route::get('/clients/update', [ClientsController::class, 'update'])->name('clients.update');
// Rota para RECEBER os dados e salvar (POST)
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');

// Rotas Gerais
Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/pedidos', [ClientsController::class, 'index'])->name('pedidos.index');
Route::get('/fornecedores', [ClientsController::class, 'index'])->name('fornecedores.index');
Route::get('/estoques', [ClientsController::class, 'index'])->name('estoques.index');
Route::get('/produtos', [ClientsController::class, 'index'])->name('produtos.index');



//estoques

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', EstoquesController::class);
});


// Rotas para estrutura de clientes para cadastro , edição e exclusão
// Rota para mostrar o formulário
Route::get('/estoques/create', [EstoquesController::class, 'create'])->name('estoques.create');
// Rota para editar os dados
Route::get('/estoques/edit', [EstoquesController::class, 'edit'])->name('estoques.edit');
Route::get('/estoques/update', [EstoquesController::class, 'update'])->name('estoques.update');
// Rota para RECEBER os dados e salvar (POST)
Route::post('/estoques', [EstoquesController::class, 'store'])->name('estoques.store');

// Rotas Gerais
Route::get('/estoques', [EstoquesController::class, 'index'])->name('estoques.index');
Route::get('/pedidos', [EstoquesController::class, 'index'])->name('pedidos.index');
Route::get('/fornecedores', [EstoquesController::class, 'index'])->name('fornecedores.index');
Route::get('/estoque', [EstoquesController::class, 'index'])->name('estoque.index');
Route::get('/produto', [EstoquesController::class, 'index'])->name('produtos.index');



//fornecedores

Route::middleware(['auth'])->group(function () {
    Route::resource('fornecedores', FornecedoresController::class);
});


// Rotas para estrutura de fornecedores para cadastro , edição e exclusão
// Rota para mostrar o formulário
Route::get('/fornecedores/create', [FornecedoresController::class, 'create'])->name('fornecedores.create');
// Rota para editar os dados
Route::get('/fornecedores/edit', [FornecedoresController::class, 'edit'])->name('fornecedores.edit');
Route::get('/fornecedores/update', [FornecedoresController::class, 'update'])->name('fornecedores.update');
// Rota para RECEBER os dados e salvar (POST)
Route::post('/fornecedores', [FornecedoresController::class, 'store'])->name('fornecedores.store');

// Rotas Gerais
Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedores.index');
Route::get('/pedido', [FornecedoresController::class, 'index'])->name('pedidos.index');
Route::get('/fornecedor', [FornecedoresController::class, 'index'])->name('fornecedores.index');
Route::get('/estoque', [FornecedoresController::class, 'index'])->name('estoque.index');
Route::get('/produto', [FornecedoresController::class, 'index'])->name('produtos.index');



//produtos

    Route::middleware(['auth'])->group(function () {
    Route::resource('produtos', ProdutosController::class);
});


// Rotas para estrutura de produtos para cadastro , edição e exclusão
// Rota para mostrar o formulário
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produtos.create');
// Rota para editar os dados
Route::get('/produtos/edit', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::get('/produtos/update', [ProdutosController::class, 'update'])->name('produtos.update');
// Rota para RECEBER os dados e salvar (POST)
Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store');

// Rotas Gerais
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/pedido', [ProdutosController::class, 'index'])->name('pedidos.index');
Route::get('/fornecedor', [ProdutosController::class, 'index'])->name('fornecedores.index');
Route::get('/estoque', [ProdutosController::class, 'index'])->name('estoque.index');
Route::get('/produto', [ProdutosController::class, 'index'])->name('produtos.index');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/pedidos', [PedidosController::class, 'index'])->name('Pedidos.index');

    Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');

    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedores.index');

    Route::get('/estoques', [EstoquesController::class, 'index'])->name('estoques.index');

    Route::get('/produtos', [ProdutosController::class, 'index'])->name('Produtos.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';
