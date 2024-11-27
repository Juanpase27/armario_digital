<?php

namespace Database\Seeders;

use App\Models\GarmentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Chaquetas o Busos', 'description' => 'Incluye chaquetas, suéteres y busos.'],
            ['name' => 'Camisas o Camisetas', 'description' => 'Incluye camisas, camisetas y polos.'],
            ['name' => 'Pantalonetas o Derivados', 'description' => 'Incluye pantalones largos, cortos y faldas.'],
            ['name' => 'Zapatos', 'description' => 'Incluye zapatos casuales, deportivos, etc.'],
        ];

        foreach ($categories as $category) {
            GarmentCategory::updateOrCreate(
                ['name' => $category['name']], // Esto evita duplicados
                ['description' => $category['description']]
            );
        }
    }
}
