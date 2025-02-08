<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDefault extends Model
{
    //
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
