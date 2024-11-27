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
        Schema::create('garments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users
            $table->foreignId('category_id')->constrained('garment_categories')->onDelete('restrict'); // Relación con garment_categories
            $table->string('name'); // Nombre de la prenda
            $table->string('color')->nullable(); // Color de la prenda
            $table->string('image_path')->nullable(); // Ruta de la imagen
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garments');
    }
};
