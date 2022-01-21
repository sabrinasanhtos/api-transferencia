<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carteira_id')
                ->references('id')
                ->on('carteira');
            $table->string('autorizacao', 255)->unique();
            $table->string('tipo', 80);
            $table->float('valor', 8, 2);
            $table->integer('pagadora')
                ->references('id')
                ->on('banco');
            $table->integer('beneficiaria')
                ->references('id')
                ->on('banco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacao');
    }
}
