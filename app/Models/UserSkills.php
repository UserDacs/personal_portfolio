<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSkills extends Model
{
    use HasFactory, Notifiable;
    //

    protected $fillable = [
        'user_id', 'back_end', 'front_end', 'server_side', 'years_exp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
