<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEducation extends Model
{
    use HasFactory, Notifiable;
    //

    protected $fillable = [
        'user_id', 'schoolname', 'schooladdress','course', 'major', 'year', 'thesis'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
