<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Appointment::create([
            'start_time' => '',
            'finish_time' => '',
            'comments' => 'Beispiel-Kommentar',
            'client_id' => '1',
            'employee_id' => '1',
        ]);
    }
}
