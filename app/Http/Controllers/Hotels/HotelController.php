<?php

namespace App\Http\Controllers\Hotels;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
class HotelController extends Controller
{

    public function index()
    {
        $hotels = Hotel::all();
        return response()->json($hotels);
    }

    public function store(Request $request)
    {
        $hotel = Hotel::create($request->all());
        return response()->json($hotel, 201);
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }
    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        $hotel->name = $request->input('name');
        $hotel->address = $request->input('image_path');
        $hotel->save();

        return response()->json($hotel);
    }
    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        $hotel->delete();

        return response()->json(['message' => 'Hotel deleted']);
    }

}
