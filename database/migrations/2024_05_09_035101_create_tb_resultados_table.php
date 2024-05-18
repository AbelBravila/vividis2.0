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
        Schema::create('tb_resultados', function (Blueprint $table) {
            $table->id("ID_RESULTADO");
            $table->string('ID_SERVICIO');
            $table->string('DIAGNOSTICO');
            $table->string('REPARACIONES');
            $table->string('REPUESTOS');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_resultados');
    }
};
