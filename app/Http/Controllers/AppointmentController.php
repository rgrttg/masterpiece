<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // speichere den Termin
    public function store(Request $request)
    {
        // validate the request
        // $request->validate([
        //     'start_time' => 'required',
        //     'finish_time' => 'required',
        //     'comments' => 'required',
        //     'employee_id' => 'required',
        //     'client_id' => 'required',
        // ]);

        // save the appointment
        // $appointment = Appointment::create($request->all());

        // DEVS: Hardcoded appointment
        $appointment = Appointment::create([
            'start_time' => '2024-06-20 11:00:00',
            'finish_time' => '2024-06-20 12:00:00',
            'comments' => 'Status',
            'client_id' => '1',
            'employee_id' => '1',
        ]);
        
        // gib den Termin zurück
        return response()->json($appointment, 201);
    }
}
