<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use http\Client\Response;
use http\Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Tourist;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RoomBookingController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:api');
    }
public function index()
{
    $bookings = RoomBooking::all();

    $response = [
        'status' => 'success',
        'message' => 'all rooms booked',
        'data' => $bookings
    ];

//    foreach ($bookings as $booking) {
//        $response[] = [
//            'id' => $booking->id,
//            'hotel_id' => $booking->hotel_id,
//            'room_id' => $booking->room_id,
//            'checkin' => $booking->checkin,
//            'checkout' => $booking->checkout,
//            // Add any other fields you want to include in the response
//        ];
//    }

    return response()->json($response);
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'tourist_id' => 'required|integer',
            'room_id' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            "type"=>'required|string'
        ]);


//    ------------------ room booking --------------------------

//        $is_booked = RoomBooking::isBooked($data['room_id'], $data['check_in'], $data['check_out']);
//
//        if ($is_booked) {
//            throw new HttpResponseException(response()->json([
//                'status' => 'error',
//                'message' => 'this room is booked'
//            ]));
//        }

//        return $is_booked;

        $booking = RoomBooking::create([
            'room_id' => $data['room_id'],
            'tourist_id' => $data['tourist_id'],
            'type' => $data['type'],
            'check_in' => $data['check_in'],
            'check_out' => $data['check_out'],
        ]);


        $response = [
            'status' => 'success',
            'message' => 'room booked successfully' ,
        ];

        return response()->json($response, 201);
    }

    public function show($id)
    {
        $booking = RoomBooking::findOrFail($id);

        return response()->json([
            'id' => $booking->id,
            'tourist_id' => $booking->tourist_id,
            'room_id' => $booking->room_id,
            'checkin' => $booking->checkin,
            'checkout' => $booking->checkout,
            'type' => $booking->type,
            // Add any other fields you want to include in the response
        ]);

    }










































    // public function store(Request $request)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'room_id' => 'required|integer',
    //         'hotel_id' => 'required|integer',
    //         'tourist_id'=>'required|integer',
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'email' => 'required|email',
    //         'phone' => 'required|string',
    //         'type' => 'required|string',
    //         'check_in' => 'required|date',
    //         'check_out' => 'required|date',
    //     ]);

    //     // Create a new Tourist record with the given data
    //     $tourist = Tourist::create([
    //         'first_name' => $validatedData['first_name'],
    //         'last_name' => $validatedData['last_name'],
    //         'email' => $validatedData['email'],
    //         'phone' => $validatedData['phone'],
    //          'password' => Hash::make($validatedData['password']), // set a value for the password attribute
    //     ]);


    //     // Create a new RoomBooking record with the given data and the tourist_id value
    //     $roomBooking = RoomBooking::create([
    //         'room_id' => $validatedData['room_id'],
    //         'hotel_id' => $validatedData['hotel_id'],
    //         'tourist_id' =>$tourist-> id,
    //         'first_name' => $validatedData['first_name'],
    //         'last_name' => $validatedData['last_name'],
    //         'email' => $validatedData['email'],
    //         'phone' => $validatedData['phone'],
    //         'type' => $validatedData['type'],
    //         'check_in' => $validatedData['check_in'],
    //         'check_out' => $validatedData['check_out'],
    //     ]);

    //     // Return a response indicating success
    //     return response()->json([
    //         'message' => 'Room booking created successfully',
    //         'room_booking' => $roomBooking
    //     ], 201);
    // }







    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'room_id' => 'required',
    //         'hotel_id' => 'required',
    //         'tourist_id' => 'required',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'type' => 'required',
    //         'check_in' => 'required|date',
    //         'check_out' => 'required|date',

    //     ]);

    //     // Check if the room is available for the given dates
    //     if (!RoomBooking::isRoomAvailable($validatedData['room_id'], $validatedData['check_in'], $validatedData['check_out'])) {
    //         return response()->json(['message' => 'Sorry, the room is not available for the selected dates.'], 409);
    //     }

    //     // Create a new room booking
    //     $roomBooking = new RoomBooking();
    //     $roomBooking->fill($validatedData);
    //     $roomBooking->save();

    //     return response()->json(['message' => 'Booking successful.', 'roomBooking' => $roomBooking], 201);
    // }

    // public function show($id)
    // {
    //     $roomBooking = RoomBooking::findOrFail($id);

    //     return response()->json(['roomBooking' => $roomBooking], 200);
    // }

    // public function update(Request $request, $id)
    // {
    //     $roomBooking = RoomBooking::findOrFail($id);

    //     $validatedData = $request->validate([
    //         'room_id' => 'required',
    //         'hotel_id' => 'required',
    //         'tourist_id' => 'required',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'type' => 'required',
    //         'check_in' => 'required|date',
    //         'check_out' => 'required|date',
    //     ]);

    //     // Check if the room is available for the new dates
    //     if (!RoomBooking::isRoomAvailable($validatedData['room_id'], $validatedData['check_in'], $validatedData['check_out'], $id)) {
    //         return response()->json(['message' => 'Sorry, the room is not available for the selected dates.'], 409);
    //     }

    //     // Update the room booking
    //     $roomBooking->fill($validatedData);
    //     $roomBooking->save();

    //     return response()->json(['message' => 'Booking updated.', 'roomBooking' => $roomBooking], 200);
    // }

    // public function destroy($id)
    // {
    //     $roomBooking = RoomBooking::findOrFail($id);
    //     $roomBooking->delete();

    //     return response()->json(['message' => 'Booking deleted.'], 200);
    // }




    // public function bookRoom(Request $request)
    // {
    //     $validated = $request->validate([
    //         'tourist_id' => 'required|exists:tourists,id',
    //         'hotel_id' => 'required|exists:hotels,id',
    //         'room_id' => 'required|exists:rooms,id',
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'email' => 'required|email',
    //         'phone' => 'required|string',
    //         'type' => 'required|string',
    //         'check_in' => 'required|date',
    //         'check_out' => 'required|date'
    //     ]);

    //     $tourist = Tourist::find($validated['tourist_id']);
    //     $hotel = Hotel::find($validated['hotel_id']);
    //     $room = Room::find($validated['room_id']);

    //     if (!$tourist || !$hotel || !$room) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Invalid tourist, hotel, or room ID'
    //         ], 404);
    //     }

    //     // Check if the room is already booked
    //     $existingBooking = RoomBooking::where('room_id', $room->id)
    //         ->where('hotel_id', $hotel->id)
    //         ->where('check_in', '<=', $validated['check_out'])
    //         ->where('check_out', '>=', $validated['check_in'])
    //         ->first();

    //     if ($existingBooking) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'The room is already booked during this time period'
    //         ], 400);
    //     }

    //     $booking = new RoomBooking();
    //     $booking->tourist_id = $validated['torusit_id'];
    //     $booking->hotel_id = $validated['hotel_id'];
    //     $booking->room_id = $validated['room_id'];
    //     $booking->first_name = $validated['first_name'];
    //     $booking->second_name = $validated['second_name'];
    //     $booking->email = $validated['email'];
    //     $booking->phone = $validated['phone'];
    //     $booking->type = $validated['type'];
    //     $booking->check_in= $validated['check_in'];
    //     $booking->check_out = $validated['check_out'];
    //     $booking->save();

    //     return response()->json([
    //         'success' => true,
    //         'data' => $booking
    //     ]);
    // }
}
