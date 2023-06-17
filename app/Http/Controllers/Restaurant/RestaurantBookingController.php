<?php

namespace App\Http\Controllers\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantBookingRequest;
use App\Models\Restaurant;
use App\Models\RestaurantBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
class RestaurantBookingController extends Controller
{

    public function index()
    {
        $bookings = RestaurantBooking::where('tourist_id', Auth::id())->get();

        return response()->json([
            'status' => 'success',
            'message' => 'get all user restaurant booking',
            'data' => $bookings
        ]);
    }

    public function store(RestaurantBookingRequest $request)
    {
            $validated = $request->validated();

            $rest_book = RestaurantBooking::create([
                'tourist_id' => Auth::id(),
                'restaurant_id' => $validated['restaurant_id'],
                'people_count' => $validated['people_count'],
                'booking_date' => $validated['booking_date'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'your booking is submitted'
            ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $booking = RestaurantBooking::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        // Update booking fields
        $booking->save();

        return response()->json(compact('booking'));
    }

    public function destroy(int $id)
    {
        $booking = RestaurantBooking::where('id', $id)->where();

        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }


}
