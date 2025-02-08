<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory, Notifiable;
    //

    protected $fillable = [
        'user_id', 'description', 'imagepath'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
