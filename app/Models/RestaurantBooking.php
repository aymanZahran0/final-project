<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tourist_id',
        'restaurant_id',
        'people_count',
        'booking_date',
    ];

    public function tourist()
    {
        return $this->belongsTo(Tourist::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

