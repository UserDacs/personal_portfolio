<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'channel_id',
        'sender_id',
        'send_email_id',
        'timestamp'
    ];
}
