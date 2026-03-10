<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoquesController extends Controller
{
    public function index() 
    {
    $estoques= \App\Models\Estoques::all(); // Busca todos os estoques
    return view('estoques.index', compact('estoques'));
}
    public function create() {
        return view('estoques.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estoque_id' => 'required|exists:produtos,id',
            'capacidade' => 'nullable|string|max:8',
            'localizacao' => 'nullable|string|max:100',
        ]);

        \App\Models\Estoques::create($request->all());

        return redirect()->route('estoques.index')->with('success', 'Estoque cadastrado com sucesso!');
    }
}
