<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Kolonnen beschreibbar machen
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'subject',
        'street',
        'city',
        'birthdate'
    ];    
}
