<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Rota Pública
Route::get('/', function () {
    return view('welcome');
});

// Agrupamento de rotas protegidas por Autenticação
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas de Perfil (Padrão Laravel Breeze/Jetstream)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // -----------------------------------------------------------------------------
    // Rotas de Recursos (CRUD)
    // O comando "Route::resource" cria automaticamente as seguintes rotas para cada um:
    // GET /nome            (index - listar todos)
    // GET /nome/create     (create - formulário de criação)
    // POST /nome           (store - salvar no banco)
    // GET /nome/{id}       (show - mostrar um específico)
    // GET /nome/{id}/edit  (edit - formulário de edição)
    // PUT/PATCH /nome/{id} (update - atualizar no banco)
    // DELETE /nome/{id}    (destroy - deletar do banco)
    // -----------------------------------------------------------------------------
    
    Route::resource('clientes', ClienteController::class);
    Route::resource('fornecedores', FornecedoresController::class);
    Route::resource('estoques', EstoquesController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('pedidos', PedidoController::class);

});

// Rotas de autenticação (Login, Register, etc geradas pelo Laravel)
require __DIR__.'/auth.php';