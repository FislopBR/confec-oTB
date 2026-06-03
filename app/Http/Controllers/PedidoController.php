<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'produto'])->latest()->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedidos.create', compact('clientes', 'produtos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'status'     => 'nullable|string|max:50',
        ]);

        $produto = Produto::findOrFail($validated['produto_id']);
        $total = $produto->preco * $validated['quantidade'];

        $pedido = Pedido::create([
            'cliente_id' => $validated['cliente_id'],
            'produto_id' => $validated['produto_id'],
            'quantidade' => $validated['quantidade'],
            'total'      => $total,
            'status'     => $validated['status'] ?? 'pendente',
            'user_id'    => auth()->id(), // se quiser associar ao usuário logado
        ]);

        return redirect()->route('pedidos.index')
            ->with('success', "Pedido criado! Total: R$ " . number_format($total, 2, ',', '.'));
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedidos.edit', compact('pedido', 'clientes', 'produtos'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'status'     => 'nullable|string|max:50',
        ]);

        $produto = Produto::findOrFail($validated['produto_id']);
        $total = $produto->preco * $validated['quantidade'];

        $pedido->update([
            'cliente_id' => $validated['cliente_id'],
            'produto_id' => $validated['produto_id'],
            'quantidade' => $validated['quantidade'],
            'total'      => $total,
            'status'     => $validated['status'],
        ]);

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido removido!');
    }
}