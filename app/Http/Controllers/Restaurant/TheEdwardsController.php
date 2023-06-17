<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheEdwardsrestaurantBooking;
use Illuminate\Support\Facades\Validator;
class TheEdwardsController extends Controller
{

    public function index()
    {
        $bookings = TheEdwardsrestaurantBooking::all();

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
        $bookings = new TheEdwardsrestaurantBooking();

        $bookings->first_name = $request->input('first_name');
        $bookings->last_name = $request->input('last_name');
        $bookings->Number_of_persons = $request->input('Number_of_persons');
        $bookings->email = $request->input('email');
        // $booking->date = Carbon::parse($request->input('date'));
        // $booking->time = $request->input('time');
        $bookings->phone = $request->input('phone');
        $bookings->Message = $request->input('Message');
        $bookings->save();

        return response()->json($bookings);
    }
    public function show($id)
    {
        $bookings = TheEdwardsrestaurantBooking::find($id);

        if (!$bookings) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($bookings);
    }
    public function update(Request $request, $id)
    {
        $bookings = TheEdwardsrestaurantBooking::find($id);

        if (!$bookings) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $bookings->first_name = $request->input('first_name');
        $bookings->last_name = $request->input('last_name');
        $bookings->Number_of_persons = $request->input('Number_of_persons');
        $bookings->email = $request->input('email');
        // $booking->date = Carbon::parse($request->input('date'));
        // $booking->time = $request->input('time');
        $bookings->phone = $request->input('phone');
        $bookings->Message = $request->input('Message');
        $bookings->save();

        return response()->json($bookings);
    }
    public function destroy($id)
    {
        $bookings = TheEdwardsrestaurantBooking::find($id);

        if (!$bookings) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $bookings->delete();

        return response()->json(['message' => 'Booking deleted']);
    }
}
