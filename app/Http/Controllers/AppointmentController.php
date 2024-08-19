<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Spatie\GoogleCalendar\Event;
use Carbon;

class AppointmentController extends Controller
{
    // speichere den Termin
    public function store(Request $request)
    {
        // Validierung der Eingaben
        $request->validate([
            'employeeId' => 'required|integer',
            'status' => 'required|string',
            'clientId' => 'required|integer',
            'startTime' => 'required|date_format:Y-m-d H:i:s',
            'finishTime' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // save the appointment
        // $appointment = Appointment::create($request->all());

        // DEVS: Hardcoded appointment
        // 8ung: status wird comments
        $appointment = Appointment::create([
            'start_time' => $request->startTime,
            'finish_time' => $request->finishTime,
            'comments' => $request->status,
            'client_id' => $request->clientId,
            'employee_id' => $request->employeeId
        ]);
        
        // Speichere den Termin auch im Google Kalender
        // 8-ung: $request Lokalzeit
        // 8-ung: $event UTC
        $event = new Event();
        $event->name = $request->status;
        $event->startDateTime = new Carbon\Carbon($request->startTime);
        $event->endDateTime = new Carbon\Carbon($request->finishTime);
        $event->save();

        // gib den Termin zurück
        return response()->json($appointment, 201);
    }
}
