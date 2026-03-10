<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index() {
    $fornecedores= \App\Models\Fornecedores::all(); // Busca todos os fornecedores
    return view('fornecedores.index', compact('fornecedores'));
}
public function create() {
    return view('fornecedores.create');
}
    public function store(Request $request) {
        request()->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:18|unique:fornecedores,cnpj',
            'email' => 'required|email|unique:fornecedores,email',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
        ]);

        \App\Models\Fornecedores::create($request->all());

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor cadastrado com sucesso!');

    }

}
