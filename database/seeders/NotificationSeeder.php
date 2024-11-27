<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::create([
            'user_id' => 1,
            'message' => 'Tienes un evento programado para mañana.',
            'is_read' => false,
        ]);

        Notification::create([
            'user_id' => 1,
            'message' => 'Recuerda revisar tu armario digital.',
            'is_read' => false,
        ]);
    }
}
