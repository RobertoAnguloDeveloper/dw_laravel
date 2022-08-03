<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('usuario_id')->index('fk_usuario');
            $table->string('fecha');
            $table->string('valor_total_sin_iva');
            $table->string('iva_total');
            $table->string('valor_total_con_iva');
            $table->string('nombre_gasto');
            $table->string('lugar');
            $table->text('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
