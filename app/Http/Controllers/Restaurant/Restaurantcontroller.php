<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
class Restaurantcontroller extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }

    public function store(Request $request)
    {
        $restaurant = Restaurant::create($request->all());
        return response()->json($restaurant, 201);
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return response()->json($restaurant);
    }
}
