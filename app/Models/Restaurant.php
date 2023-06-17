<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Restaurant extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [ ];

    public function bookingrestaurant()
    {
        return $this->hasMany(BookingRestaurant::class);
    }
    public function restaurantimages()
    {
        return $this->hasMany(RestaurantImage::class);
    }
    public function tourists()
    {
        return $this->belongsToMany(Tourist::class, 'restaurant_bookings')->withPivot('people_count', 'booking_date');
    }
    
}

