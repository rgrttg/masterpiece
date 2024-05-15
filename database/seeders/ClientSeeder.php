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
            'firstname' => 'Gwyneth',
            'lastname' => 'Paltrow',
            'email' => 'gwyneth@paltrow.com',
            'phone' => '1',
            'subject' => 'Iron Man',
            'street' => 'Sunset Boulevard',
            'city' => '90210 Los Angeles',
            'birthdate' => '1972-09-27'
        ]);        
        Client::create([
            'firstname' => 'Kate',
            'lastname' => 'Winslet',
            'email' => 'kate@winslet.com',
            'phone' => '2',
            'subject' => 'Titanic',
            'street' => 'Kings Road',
            'city' => 'Reading, Berkshire ',
            'birthdate' => '1975-10-05'
        ]);        
        Client::create([
            'firstname' => 'Scarlett',
            'lastname' => 'Johansson',
            'email' => 'scarlett@johansson.com',
            'phone' => '3',
            'subject' => 'Vicky Cristina Barcelona',
            'street' => 'Broadway',
            'city' => 'New York City',
            'birthdate' => '1984-11-12'
        ]);        
        Client::create([
            'firstname' => 'Keira',
            'lastname' => 'Knightly',
            'email' => 'keira@knightly.com',
            'phone' => '4',
            'subject' => 'The Imitation Game',
            'street' => 'Bondstreet',
            'city' => 'London',
            'birthdate' => '1985-03-26'
        ]);        
    }
}
