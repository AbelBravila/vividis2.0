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
        Schema::create('tb_contactanos', function (Blueprint $table) {
            $table->id("ID_CONTACTANOS");            
            $table->string('NOMBRE_CONTACTANOS');
            $table->string('NUMERO_TELEFONO_CONTACTANOS');
            $table->string('CORREO_CONTACTANOS');
            $table->string('MENSAJE_CONTACTANOS');
            $table->string('ESTADO_CONTACTANOS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_contactanos');
    }
};
