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
            'start_time' => '2024-05-16 13:00:00',
            'finish_time' => '2024-05-16 14:00:00',
            'comments' => 'Mit AppoinmentSeeder erzeugt',
            'client_id' => '1',
            'employee_id' => '1',
        ]);
        Appointment::create([
            'start_time' => '2024-05-16 14:00:00',
            'finish_time' => '2024-05-16 15:00:00',
            'comments' => 'Mit AppoinmentSeeder erzeugt',
            'client_id' => '2',
            'employee_id' => '1',
        ]);
        Appointment::create([
            'start_time' => '2024-05-16 15:00:00',
            'finish_time' => '2024-05-16 16:00:00',
            'comments' => 'Mit AppoinmentSeeder erzeugt',
            'client_id' => '3',
            'employee_id' => '1',
        ]);
        Appointment::create([
            'start_time' => '2024-05-16 16:00:00',
            'finish_time' => '2024-05-16 17:00:00',
            'comments' => 'Mit AppoinmentSeeder erzeugt',
            'client_id' => '4',
            'employee_id' => '1',
        ]);
    }
}
