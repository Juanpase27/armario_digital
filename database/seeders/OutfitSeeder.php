<?php

namespace Database\Seeders;

use App\Models\Outfit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutfitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Outfit::create([
            'user_id' => 1, // Asegúrate de que el usuario con ID 1 existe
            'name' => 'Outfit de Verano',
            'image_path' => 'path/to/outfit1.jpg',
        ]);

        Outfit::create([
            'user_id' => 1,
            'name' => 'Outfit de Oficina',
            'image_path' => 'path/to/outfit2.jpg',
        ]);
    }
}
