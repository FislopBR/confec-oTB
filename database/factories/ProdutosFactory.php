<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutosFactory extends Factory
{
    public function definition(): array
    {
        $nomes = [
            'Camiseta Polo Azul', 'Camiseta Polo Branca', 'Camiseta Polo Vermelha',
            'Calça Jeans Clássica', 'Calça Social Preta', 'Calça Cargo Cinza',
            'Vestido Social Preto', 'Vestido Casual Estampado', 'Vestido Midi Liso',
            'Jaqueta Jeans', 'Blazer Executivo', 'Meia-estação Bege',
            'Shorts Casual', 'Bermuda Esportiva', 'Saia Plissada'
        ];

        return [
            'nome' => $this->faker->randomElement($nomes),
            'preco_venda' => $this->faker->numberBetween(5000, 25000) / 100,
            'referencia' => 'SKU-' . strtoupper($this->faker->unique()->bothify('??###')),
            'estoque' => $this->faker->numberBetween(0, 500),
        ];
    }
}
