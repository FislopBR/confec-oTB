<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()    {
        $clients=Clients::all();
        return view('clients.index',compact('clients'));
    }

public function create() {
    return view('clients.create');
}

public function store(Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'cpf' => 'required|string|max:14|unique:clients,cpf',
        'email' => 'required|email|unique:clients,email',
        'telefone' => 'nullable|string|max:20',
        'endereço' => 'nullable|string|max:255',
    ]);

    Clients::create($request->all());

    return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
}
}