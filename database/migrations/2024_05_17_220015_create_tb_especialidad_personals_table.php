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
        Schema::create('tb_especialidad_personal', function (Blueprint $table) {
            $table->id("IdEspecialidadPersonal");
            $table->integer("IdPersonal");
            $table->integer("IdTrabajo");   
            $table->string("Estado");   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_especialidad_personal');
    }
};
