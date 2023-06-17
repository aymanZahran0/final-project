<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Hotel;
use App\Models\RoomBooking;
class Room extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [ ];
    public function hotel()
    {
        return $this->belongsToOne(Hotel::class);
    }
    public function roombooking()
    {
        return $this->hasMany(RoomBooking::class);
    }
}
