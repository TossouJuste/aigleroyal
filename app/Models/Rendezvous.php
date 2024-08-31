<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;
    protected $table = 'rendezvous';
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'date_rendez_vous',
        'time_rendez_vous',
        'objectof',
        'message',
    ];
}
