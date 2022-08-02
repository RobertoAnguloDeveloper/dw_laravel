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
            $table->string('valorTotalSinIva');
            $table->string('ivaTotal');
            $table->string('valorTotalConIva');
            $table->string('nombreGasto');
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
