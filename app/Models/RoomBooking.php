<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Room;
use App\Models\Tourist;
class RoomBooking extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
         'tourist_id',
        'room_id',
         'type',
        'check_in',
        'check_out'
    ];


        public function room()
        {
            return $this->belongsToOne(Room::class);
        }

        public function tourist()
        {
            return $this->belongsToMany(Tourist::class);
        }


        public static function isRoomAvailable($room_id, $check_in, $check_out, $exclude_id = null)
        {
        // Query existing bookings for the room and dates
        $query = self::where('room_id', $room_id)
                    ->where(function ($q) use ($check_in, $check_out) {
                        $q->whereBetween('check_in', [$check_in, $check_out])
                        ->orWhereBetween('check_out', [$check_in, $check_out])
                        ->orWhere(function ($q) use ($check_in, $check_out) {
                            $q->where('check_in', '<=', $check_in)
                                ->where('check_out', '>=', $check_out);
                        });
                    });
                    if ($exclude_id) {
                        $query->where('id', '<>', $exclude_id);
                    }

                    // Count the number of existing bookings for the room and dates
                    $count = $query->count();

                    // Return true if there are no existing bookings, false otherwise
                    return $count === 0;
        }

    public static function isBooked($roomId,$start_time, $end_time)
    {
        $roomsBooking = self::where('room_id', $roomId)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('check_in', [$start_time, $end_time])
                    ->orWhereBetween('check_out', [$start_time, $end_time]);
            })->get();

        return (count($roomsBooking) > 0)? true : false;
    }

}
