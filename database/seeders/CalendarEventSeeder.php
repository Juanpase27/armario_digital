<?php

namespace Database\Seeders;

use App\Models\CalendarEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarEvent::create([
            'user_id' => 1,
            'outfit_id' => 1,
            'event_date' => '2023-10-15',
            'description' => 'Evento de verano',
        ]);

        CalendarEvent::create([
            'user_id' => 1,
            'outfit_id' => 2,
            'event_date' => '2023-10-20',
            'description' => 'Reunión de trabajo',
        ]);
    }
}
