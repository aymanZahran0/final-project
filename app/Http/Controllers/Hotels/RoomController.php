<?php

namespace App\Http\Controllers\Hotels;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return response()->json([
            'success' => true,
            'data' => $rooms
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image',
            'type'
        ]);

        $room = Room::create($validated);

        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }
    public function show($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Room not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }
    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Room not found'
            ], 404);
        }

        $validated = $request->validate([
            'image'=>'string',
            'type'=>'string'
        ]);

        $room->update($validated);

        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }
    public function destroy($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Room not found'
            ], 404);
        }

        $room->delete();

        return response()->json([
            'success' => true,
            'message' => 'Room deleted successfully'
        ]);
    }
}
