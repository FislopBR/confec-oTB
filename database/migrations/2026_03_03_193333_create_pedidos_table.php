<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
Schema::create('Pedidos', function (Blueprint $table) {
$table->id()->primary();
$table->string('cpf')->unique(); // CPF deve ser único
$table->string('email')->unique(); // Útil para login ou contato
$table->text('endereco')->nullable(); // Campo para entrega de livros
$table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pedidos');
    }
};
