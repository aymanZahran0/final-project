<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Room;
class Hotel extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [ ];
    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }
}
