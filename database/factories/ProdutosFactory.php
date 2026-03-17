<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
    return [
        'nome' => fake()->name,
        'preco' => fake()->randomFloat(2, 10, 100), // Preço entre 10 e 100
        'categoria' => fake()->randomElement(['Camisa', 'Calça', 'Vestido', 'Acessório']),
        'descricao' => fake()->sentence(),
    ];
}
}
