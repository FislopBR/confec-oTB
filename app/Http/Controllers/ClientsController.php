<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()    {
        $Clients=\App\Models\Clients::all();
        return view('clients.index',compact('clients'));
    }
}
