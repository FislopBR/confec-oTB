<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients; 

class ClientsController extends Controller
{
    // Lista todos os clientes
    public function index() 
    {
        $clientes = Clients::all(); 
        return view('clients.index', compact('clients'));
    }

    // Exibe o formulário de cadastro (a janela/página de inserção)
    public function create() 
    {
        return view('clients.create');
    }

    // Recebe os dados do formulário e salva no banco de dados
    public function store(Request $request) 
    {
        // 1. Validação simples para evitar dados vazios ou duplicados
        $request->validate([
            'nome'     => 'required|string|max:255',
            'cpf'      => 'required|string|unique:clientes',
            'email'    => 'required|email|unique:clientes',
            'telefone' => 'required|string',
            'endereco' => 'nullable|string',
        ]);

        // 2. Salva o novo cliente
        Clients::create($request->all());

        // 3. Redireciona de volta para a lista com uma mensagem de sucesso
        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }
        // Abre a tela de edição
        public function edit(Clients $clients) 
    {
        return view('clients.edit', compact('clients'));
    }

// Salva a alteração no banco
public function update(Request $request, Clients $clients) 
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|unique:clientes,cpf,' . $clients->id,
        'email' => 'required|email|unique:clientes,email,' . $clients->id,
        'telefone' => 'required',
    ]);

    $clients->update($request->all());
    return redirect()->route('clients.index')->with('success', 'Cliente atualizado!');
}

// Exclui o cliente
public function destroy(Clients $clients) 
{
    $clients->delete();
    return redirect()->route('clients.index')->with('success', 'Cliente removido!');
}

}
