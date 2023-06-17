<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Tourist extends Authenticatable implements JWTSubject
{

    use HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'SSN',
        'gender',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function roombook()
    {
        return $this->belongsToOne(RoomBooking::class);
    }
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_bookings')->withPivot('people_count', 'booking_date');
    }
}
