<?php

namespace App\Http\Controllers\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantBookingRequest;
use App\Models\Restaurant;
use App\Models\RestaurantBooking;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
class RestaurantBookingController extends Controller
{
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();

        $bookings = RestaurantBooking::where('user_id', $user->id)->get();

        return response()->json(compact('bookings'));
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $booking = new RestaurantBooking;
        $booking->user_id = $user->id;
        // Set other booking fields
        $booking->save();

        return response()->json(compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $booking = RestaurantBooking::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        // Update booking fields
        $booking->save();

        return response()->json(compact('booking'));
    }

    public function destroy($id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $booking = RestaurantBooking::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }


}
