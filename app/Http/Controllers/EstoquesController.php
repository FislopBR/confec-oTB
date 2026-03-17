<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Estoques;
use Illuminate\Http\Request;


class EstoquesController extends Controller
{
    public function index() 
    {
    $estoques= Estoques::all(); // Busca todos os estoques
    return view('estoques.index', compact('estoques'));
}
    public function create() {
        return view('estoques.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estoque_id' => 'required|string|max:255',
            'capacidade' => 'nullable|string|max:8',
            'localizacao' => 'nullable|string|max:100',
        ]);

        Estoques::create($validatedData);

        return redirect()->route('estoques.index')->with('success', 'Estoque cadastrado com sucesso!');
    }

    // Abre a tela de edição
public function edit(Estoques $estoques)
{
    return view('estoques.edit', compact('estoques'));
}

// Salva as alterações no banco de dados
public function update(Request $request, Estoques $estoques)
{
    $request->validate([
            'estoque_id' => 'required|string|max:255',
            'capacidade' => 'nullable|string|max:8',
            'localizacao' => 'nullable|string|max:100',
    ]);
 $estoques->update($request->all());
    return redirect()->route('estoques.index')->with('success', 'Estoque atualizado!');
    
    }

// Exclui o cliente
public function destroy(Estoques $estoques)
{
    $estoques->delete();
    return redirect()->route('estoques.index')->with('success', 'Estoque removido!');
}

}    

