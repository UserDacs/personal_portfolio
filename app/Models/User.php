<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'coin_password',
        'profile_image_path',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function userContact()
    {
        return $this->hasOne(UserContact::class);
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function userSkills()
    {
        return $this->hasMany(UserSkills::class);
    }

    public function userEducations()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function userExperiences()
    {
        return $this->hasMany(UserExperience::class);
    }

    public function UserDefault()
    {
        return $this->hasOne(UserDefault::class);
    }
}
