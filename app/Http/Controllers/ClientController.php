<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Methode um die Angaben zu speichern
    public function store(Request $request)
    {
        // Validierung der Eingaben
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'street' => 'required',
            'city' => 'required',
            'birthdate' => 'required'
        ]);

        // Speichern der Angaben
        $client = Client::create($request->all());

        // Rückgabe der gespeicherten Angaben
        return response()->json($client, 201);
    }
}
