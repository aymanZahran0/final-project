<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Restaurant;
class RestaurantImage extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [ ];
    public function restaurantimage()
    {
        return $this->belongsToOne(Restaurant::class);
    }
}
