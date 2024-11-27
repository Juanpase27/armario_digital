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
            'category_id' => 1,
            'color' => 'Rojo',
            'image_path' => 'path/to/image1.jpg',
        ]);

        Garment::create([
            'user_id' => 1,
            'name' => 'Pantalón Azul',
            'category_id' => 2,
            'color' => 'Azul',
            'image_path' => 'path/to/image2.jpg',
        ]);

        Garment::create([
            'user_id' => 1,
            'name' => 'Chaqueta Negra',
            'category_id' => 1,
            'color' => 'Negro',
            'image_path' => 'path/to/image3.jpg',
        ]);
    }
}
