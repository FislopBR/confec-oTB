<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pedido>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? \App\Models\User::factory(),
            'total' => $this->faker->numberBetween(10000, 100000) / 100,
            'desconto' => $this->faker->numberBetween(0, 5000) / 100,
            'status' => $this->faker->randomElement(['Pendente', 'Em Produção', 'Finalizado']),
            'codigo_rastreio' => 'TR-' . strtoupper($this->faker->unique()->bothify('###???')),
            'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}