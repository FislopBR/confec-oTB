<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
    $Produtos= \App\Models\Produtos::all(); // Busca todos os produtos
    return view('Produtos.index', compact('Produtos'));
}

    public function create() {
        return view('Produtos.create');
    }
    public function store(Request $request) {  
        request()->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ]);

        \App\Models\Produtos::create($request->all());

        return redirect()->route('Produtos.index')->with('success', 'Produto cadastrado com sucesso!');

    }

}
