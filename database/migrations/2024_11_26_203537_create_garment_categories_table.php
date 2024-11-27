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
        Schema::create('garment_categories', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('name'); // Nombre de la categoría
            $table->string('description')->nullable(); // Descripción de la categoría
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garment_categories');
    }
};
