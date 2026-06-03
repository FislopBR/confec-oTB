<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::factory(15)->create();

        // Create clients
        \App\Models\Cliente::factory(25)->create();

        // Create suppliers
        \App\Models\Fornecedores::factory(20)->create();

        // Create products
        \App\Models\Produto::factory(40)->create();

        // Create orders
        \App\Models\Pedido::factory(30)->create();

        // Create stock movements
        \App\Models\Estoques::factory(50)->create();
    }
}
