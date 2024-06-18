<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    //
    public function store(Request $request)
    {
        // validate the request
        $request->validate([
            'start_time' => 'required|date',
            // 'finish_time' => 'required',
            // 'employee_id' => 'required',
            // 'client_id' => 'required',
            // 'comments' => 'required',
        ]);
        // create the appointment
        $appointment = Appointment::create([
            'start_time' => $request->start_time,
            // 'finish_time' => $request->finish_time,
            // 'employee_id' => $request->employee_id,
            // 'client_id' => $request->client_id,
            // 'comments' => $request->comments,
        ]);
        // return the response
        return response()->json([
            'message' => 'Appointment created successfully',
            'appointment' => $appointment
        ]);
    }
}
