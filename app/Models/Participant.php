<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'channel_id',
        'user_id',
        'role'
    ];
    
}
