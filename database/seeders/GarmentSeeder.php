<?php

namespace Database\Seeders;

use App\Models\Garment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Garment::create([
            'user_id' => 1, // Asegúrate de que el usuario con ID 1 existe
            'name' => 'Camiseta Roja',
            'category' => 'Camisetas',
            'color' => 'Rojo',
            'image_path' => 'path/to/image1.jpg',
        ]);

        Garment::create([
            'user_id' => 1,
            'name' => 'Pantalón Azul',
            'category' => 'Pantalones',
            'color' => 'Azul',
            'image_path' => 'path/to/image2.jpg',
        ]);

        Garment::create([
            'user_id' => 1,
            'name' => 'Chaqueta Negra',
            'category' => 'Abrigos',
            'color' => 'Negro',
            'image_path' => 'path/to/image3.jpg',
        ]);
    }
}
