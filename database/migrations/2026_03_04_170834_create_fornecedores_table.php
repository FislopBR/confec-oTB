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
Schema::create('Fornecedores', function (Blueprint $table) {
$table->id()->primary();
$table->string('nome');
$table->string('email')->unique(); // Útil para login ou contato
$table->string('telefone')->nullable(); // Nullable caso o cliente não tenha/queira dar
$table->text('endereco')->nullable(); // Campo para entrega de livros
$table->timestamps();
});
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
