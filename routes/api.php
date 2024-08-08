<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\TokenController;

use App\Http\Controllers\UserController;

use Spatie\GoogleCalendar\Event;

Route::post('/sanctum/token', TokenController::class);

// DEVS
Route::get("/test-me", function () {
    return 'Hallo vom Laravel Backend!';
});

// Route um den Termin zu reservieren
Route::post('/new-appointment', [AppointmentController::class, 'store']);

// Route um die Angaben zu speichern
Route::post('/new-client', [ClientController::class, 'store']);

/**
 * AUTH ROUTES
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', [UserController::class, 'show']);
});

Route::get('/calendar', function(){
    $event = new Event();
    $event->name = 'Test Event';
    $event->startDateTime = Carbon\Carbon::now();
    $event->endDateTime = Carbon\Carbon::now()->addHour();
    $event->save();
});