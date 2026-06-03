<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'                => 'required|string|max:255',
            'preco'               => 'required|numeric',
            'categoria'           => 'required|string',
            'descricao'           => 'nullable|string',
            'sku'                 => 'required|string|unique:produtos',
            'quantidade'          => 'required|integer|min:0',
            'local_armazenamento' => 'nullable|string|max:100',
            'imagem'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('produtos', 'public');
            $validated['imagem'] = $path;
        }

        Produto::create($validated);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $validated = $request->validate([
            'nome'                => 'required|string|max:255',
            'preco'               => 'required|numeric',
            'categoria'           => 'required|string',
            'descricao'           => 'nullable|string',
            'sku'                 => 'required|string|unique:produtos,sku,' . $produto->id,
            'quantidade'          => 'required|integer|min:0',
            'local_armazenamento' => 'nullable|string|max:100',
            'imagem'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produto->update($validated);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->imagem && \Storage::disk('public')->exists($produto->imagem)) {
            \Storage::disk('public')->delete($produto->imagem);
        }
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}