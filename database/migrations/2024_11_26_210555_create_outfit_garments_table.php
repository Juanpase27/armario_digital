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
        Schema::create('outfit_garment', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('outfit_id')->constrained()->onDelete('cascade'); // Relación con outfits
            $table->foreignId('garment_id')->constrained()->onDelete('cascade'); // Relación con prendas
            $table->timestamps(); // Campos created_at y updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outfit_garments');
    }
};
