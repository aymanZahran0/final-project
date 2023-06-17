<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\RestaurantImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RestaurantImageController extends Controller
{

    public function index()
    {
        $images = RestaurantImage::all();

        return response()->json($images);
    }


    public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('public/images');

        $restaurantImage = new RestaurantImage();
        $restaurantImage->restaurant_id = $request->input('restaurant_id');
        $restaurantImage->image_path = $imagePath;
        $restaurantImage->save();

        return response()->json($restaurantImage);
    }

    public function show($id)
    {
        $image = RestaurantImage::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        return response()->json($image);
    }


    public function update(Request $request, $id)
    {
        $image = RestaurantImage::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $imagePath = $request->file('image')->store('public/images');

        $image->restaurant_id = $request->input('restaurant_id');
        $image->image_path = $imagePath;
        $image->save();

        return response()->json($image);
    }


    public function destroy($id)
    {
        $image = RestaurantImage::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted']);
    }
}
