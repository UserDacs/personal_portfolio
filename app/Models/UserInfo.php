<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'user_id', 'firstname', 'middlename', 'lastname', 'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
