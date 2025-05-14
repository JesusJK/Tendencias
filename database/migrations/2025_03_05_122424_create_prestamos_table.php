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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->Datetime('fecha_prestamo');
            $table->String('estado');
            $table->unsignedBigInteger('persona_id');
            $table->String('material');
            $table->Datetime('fecha_devolucion');
            $table->dateTime('fecha_entrega')->nullable();
            $table->INTEGER('dias_retraso');
            $table->timestamps();

            $table->foreign('persona_id')
            ->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
