<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lib_autor', function (Blueprint $table) {
            $table->increments('cod_autor');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('nombre_completo', 200);

            $table->unsignedInteger('cod_sexo');
            $table->foreign('cod_sexo')->references('cod_sexo')->on('lib_sexo')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lib_autor');
    }
};
