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
        Schema::create('macros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->longText('instruccion');            
            $table->string('file')->nullable();
            $table->longText('codigo');
            $table->boolean('activa')->default(true);
            $table->foreignId('categoria_id')->nullable();
            $table->timestamps();
           // $table->fulltext(['titulo', 'descripcion', 'instruccion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('macros');
    }
};
