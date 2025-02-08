<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory, Notifiable;
    //

    protected $fillable = [
        'user_id', 'address', 'phone_number', 'emailaddress', 'link_github', 'link_personal_portfolio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
