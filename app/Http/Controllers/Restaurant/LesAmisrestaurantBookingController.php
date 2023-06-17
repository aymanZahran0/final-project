<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LesAmisrestaurantBooking;
use Illuminate\Support\Facades\Validator;
class LesAmisrestaurantBookingController extends Controller
{
    public function index()
    {
        $bookings = LesAmisrestaurantBooking::all();

        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'Number_of_persons' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'Message' => 'nullable',
        ]);

        if ($validator->fails()) {
            $errors = new \stdClass();
            foreach ($validator->errors()->toArray() as $field => $error) {
                $errors->$field = $error[0];
            }
            return response()->json(['errors' => $errors], 400);
        }
        $booking = new LesAmisrestaurantBooking();

        $booking->first_name = $request->input('first_name');
        $booking->last_name = $request->input('last_name');
        $booking->Number_of_persons = $request->input('Number_of_persons');
        $booking->email = $request->input('email');
        // $booking->date = Carbon::parse($request->input('date'));
        // $booking->time = $request->input('time');
        $booking->phone = $request->input('phone');
        $booking->Message = $request->input('Message');
        $booking->save();

        return response()->json($booking);
    }
    public function show($id)
    {
        $booking = LesAmisrestaurantBooking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }
    public function update(Request $request, $id)
    {
        $booking = LesAmisrestaurantBooking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->first_name = $request->input('first_name');
        $booking->last_name = $request->input('last_name');
        $booking->Number_of_persons = $request->input('Number_of_persons');
        $booking->email = $request->input('email');
        // $booking->date = Carbon::parse($request->input('date'));
        // $booking->time = $request->input('time');
        $booking->phone = $request->input('phone');
        $booking->Message = $request->input('Message');
        $booking->save();

        return response()->json($booking);
    }
    public function destroy($id)
    {
        $booking = LesAmisrestaurantBooking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }
}
