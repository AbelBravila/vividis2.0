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
        Schema::create('tb_citas', function (Blueprint $table) {
            $table->id("IdCita");
            $table->integer("IdPersonal");
            $table->integer("IdTrabajo");
            $table->string("FechaCita");
            $table->integer("Tmanana");  
            $table->integer("Ttarde");  
            $table->integer("IdCliente");
            $table->string("Cliente");            
            $table->string("Estado");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_citas');
    }
};
