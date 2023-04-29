<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetaNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_nota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etiqueta_id')->nullable();
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');
        
            $table->unsignedBigInteger('nota_id')->nullable();
            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('cascade');
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
        Schema::dropIfExists('etiqueta_nota');
    }
}
