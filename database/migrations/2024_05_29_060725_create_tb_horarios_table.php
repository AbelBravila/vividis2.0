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
        Schema::create('tb_horarios', function (Blueprint $table) {
            $table->id("IdHorario");
            $table->string("Horario");
            $table->integer("Tmanana");
            $table->integer("Ttarde");  
            $table->string("Estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_horarios');
    }
};
