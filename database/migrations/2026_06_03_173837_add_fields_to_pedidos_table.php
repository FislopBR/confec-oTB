<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pedidos', function (Blueprint $table) {
        $table->unsignedBigInteger('cliente_id')->after('user_id')->nullable();
        $table->unsignedBigInteger('produto_id')->after('cliente_id')->nullable();
        $table->integer('quantidade')->default(1)->after('produto_id');
        // Remova 'user_id' se não for mais necessário
    });
}
public function down()
{
    Schema::table('pedidos', function (Blueprint $table) {
        $table->dropColumn(['cliente_id', 'produto_id', 'quantidade']);
    });
}
};
