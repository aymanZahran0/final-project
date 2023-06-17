<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class LesAmisrestaurantBooking extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'Number_of_persons',
        'phone',
        // 'Time',
        'Message',
    ];
}
