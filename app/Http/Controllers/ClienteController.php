<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Exibe a lista de todos os clientes.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Mostra o formulário para cadastrar um novo cliente.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Valida e armazena um novo cliente no banco de dados.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nome'     => 'required|string|max:255',
        'cpf'      => 'required|string|unique:clientes',
        'email'    => 'required|email|unique:clientes',
        'telefone' => 'required|string',
        'endereco' => 'nullable|string',
    ]);

    // Opcional: limpar formatação de CPF e telefone
    $validated['cpf'] = preg_replace('/\D/', '', $validated['cpf']);
    $validated['telefone'] = preg_replace('/\D/', '', $validated['telefone']);

    Cliente::create($validated);

    return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
}

    /**
     * Exibe os detalhes de um cliente específico (read-only).
     * Caso não queira esta funcionalidade, remova a rota 'show' em web.php.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Mostra o formulário de edição de um cliente.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Atualiza os dados de um cliente existente.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'cpf'      => 'required|string|unique:clientes,cpf,' . $cliente->id,
            'email'    => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string',
            'endereco' => 'nullable|string',
        ]);

        $cliente->update($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove um cliente do banco de dados.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente removido com sucesso!');
    }
}