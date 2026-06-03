<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('estoques', function (Blueprint $table) {
        // Se não existir a coluna 'id' auto-increment, adicione
        if (!Schema::hasColumn('estoques', 'id')) {
            $table->increments('id')->first();
        } else {
            // Garante que 'id' seja auto-increment
            $table->increments('id')->change();
        }
    });
}

public function down()
{
    // Opcional: reversão (cuidado)
}
};
