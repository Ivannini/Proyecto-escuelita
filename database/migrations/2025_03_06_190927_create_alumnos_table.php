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
    Schema::create('alumnos', function (Blueprint $table) {
        $table->id();                        // id
        $table->string('nombre');            // nombre
        $table->string('correo')->unique();  // correo (único)
        $table->date('fecha_nacimiento');    // fecha de nacimiento
        $table->string('ciudad');            // ciudad
        $table->timestamps();                // created_at, updated_at
    });
}

public function down()
{
    Schema::dropIfExists('alumnos');
}

};

















