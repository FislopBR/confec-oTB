<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->integer('quantidade')->default(0)->after('preco');
        $table->string('local_armazenamento')->nullable()->after('quantidade');
        $table->string('imagem')->nullable()->after('local_armazenamento');
    });
}

public function down()
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->dropColumn(['quantidade', 'local_armazenamento', 'imagem']);
    });
}
};
