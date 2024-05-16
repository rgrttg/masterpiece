<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    // Version 1 aus:
    // https://laraveldaily.com/post/laravel-appointment-calendar-fullcalendar-demo
    protected $fillable = [
        'name'
    ];      
}
