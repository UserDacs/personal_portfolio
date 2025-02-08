<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class SendEmail extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name', 'subject', 'body', 'recipient_email', 'is_read','status'
    ];

    public static function getChannel($channel_id)
    {
        return DB::select("CALL FUNCTION_CHANNEL(?)", [$channel_id]);
    }

    public static function getBySubjectAndEmail($subject, $email)
    {
        return DB::select("CALL FUNCTION_SUBJECT_EMAIL(?, ?)", [$subject, $email]);
    }

}
