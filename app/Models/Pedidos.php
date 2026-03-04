<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importe isso
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory; // Adicione isso dentro da classe

    protected $fillable = ['cpf', 'email','endereco'];
}
