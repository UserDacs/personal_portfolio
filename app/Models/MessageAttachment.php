<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessageAttachment extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'message_id',
        'file_path',
        'file_type'
    ];
}


