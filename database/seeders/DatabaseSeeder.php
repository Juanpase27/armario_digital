<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\GarmentCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::create([
            'name' => 'Juan',
            'email' => 'juan@juan.com',
            'password' => bcrypt('password'), // Asegúrate de encriptar la contraseña
        ]);
        GarmentCategory::create([
            'name' => 'Chaquetas o Busos',
            'description' => 'Incluye chaquetas, suéteres y busos.',
        ]);

        GarmentCategory::create([
            'name' => 'Camisas o Camisetas',
            'description' => 'Incluye camisas, camisetas y polos.',
        ]);

        GarmentCategory::create([
            'name' => 'Pantalonetas o Derivados',
            'description' => 'Incluye pantalones largos, cortos y faldas.',
        ]);

        GarmentCategory::create([
            'name' => 'Zapatos',
            'description' => 'Incluye zapatos casuales, deportivos, etc.',
        ]);
        $this->call([
            OutfitSeeder::class,
            GarmentSeeder::class,
            CalendarEventSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
