<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importe isso
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco'];
    protected $dates = ['deleted_at']; // opcional no Laravel 8+
}
