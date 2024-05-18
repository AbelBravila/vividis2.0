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
        Schema::create('tb_personal', function (Blueprint $table) {
            $table->id("IdPersonal");
            $table->string("NombrePersona", 255);
            $table->integer("IdHorario");
            $table->string("Horario");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_personal');
    }
};
