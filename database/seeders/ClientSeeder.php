<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Client::create([
            'firstname' => 'Ani',
            'lastname' => 'Hagi',
            'email' => 'ah@bh.ch',
            'phone' => '0041 41 414 14 14',
            'subject' => 'Test-Thema',
            'street' => 'Talstrasse 1',
            'city' => '8000 Zürich',
            'birthdate' => '1978-08-07'
        ]);        
    }
}
