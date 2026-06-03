<?php

namespace App\Http\Controllers;

use App\Models\Estoques;
use Illuminate\Http\Request;

class EstoquesController extends Controller
{
    public function index()
    {
        $estoques = Estoques::all();
        return view('estoques.index', compact('estoques'));
    }

    public function create()
    {
        return view('estoques.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'estoque_id'  => 'required|string|max:255|unique:estoques,estoque_id',
            'capacidade'  => 'nullable|string|max:8',
            'localizacao' => 'nullable|string|max:100',
        ]);

        Estoques::create($validated);

        return redirect()->route('estoques.index')->with('success', 'Estoque cadastrado com sucesso!');
    }

    public function edit(Estoques $estoque) // renomeei $estoques para $estoque para clareza
    {
        return view('estoques.edit', compact('estoque'));
    }

    public function update(Request $request, Estoques $estoque)
    {
        $validated = $request->validate([
            'estoque_id'  => 'required|string|max:255|unique:estoques,estoque_id,' . $estoque->id,
            'capacidade'  => 'nullable|string|max:8',
            'localizacao' => 'nullable|string|max:100',
        ]);

        $estoque->update($validated);

        return redirect()->route('estoques.index')->with('success', 'Estoque atualizado com sucesso!');
    }

    public function destroy(Estoques $estoque)
    {
        $estoque->delete();
        return redirect()->route('estoques.index')->with('success', 'Estoque removido!');
    }
}