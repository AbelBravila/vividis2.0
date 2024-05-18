<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_clientes', function (Blueprint $table) {
            $table->id("ID_CLIENTE");
            $table->string('NOMBRE_CLIENTE');
            $table->string('TELEFONO_CLIENTE');
            $table->string('DIRECCION_CLIENTE');
            $table->string('FECHAINGRESO_CLIENTE');
            $table->string('ESTADO_CLIENTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_clientes');
    }
};
