<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('estoques', function (Blueprint $table) {
        // Adiciona a coluna 'id' auto-incremento como primeira coluna
        $table->increments('id')->first();
    });
}

public function down()
{
    Schema::table('estoques', function (Blueprint $table) {
        $table->dropColumn('id');
    });
}
};
