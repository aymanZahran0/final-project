<?php

use App\Http\Controllers\Admin\Admincontroller;

use App\Http\Controllers\Restaurant\RestaurantBookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Tourist\Touristcontroller;
use App\Http\Controllers\Restaurant\Restaurantcontroller;
use App\Http\Controllers\Restaurant\RestaurantImageController;
use App\Http\Controllers\Restaurant\MezcalRestaurantBookingController;
use App\Http\Controllers\Restaurant\LeDeckRestaurantBookingController;
use App\Http\Controllers\Restaurant\PiazziniRestaurantBookingController;
use App\Http\Controllers\Restaurant\TheEdwardsrestaurantBooking;
use App\Http\Controllers\Restaurant\LesAmisrestaurantBookingController;
use App\Http\Controllers\Restaurant\ElDahanRestaurantBookingController;
use App\Http\Controllers\Restaurant\HadramawtAntarBookingController;
use App\Http\Controllers\Restaurant\HaronsRestaurantBookingController;
use App\Http\Controllers\Restaurant\OmsherifRestaurantBookingController;
use App\Http\Controllers\Restaurant\GarciaRestaurantCafeController;
use App\Http\Controllers\Restaurant\SachiHeliopolisController;
use App\Http\Controllers\Restaurant\ShalaolaoRestaurantBookingController;
use App\Http\Controllers\Hotels\HotelController;
use App\Http\Controllers\Hotels\RoomController;
use App\Http\Controllers\Hotels\RoomBookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| API Routes For Tourist Authentication.
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');
});


Route::controller(Touristcontroller::class)->group(function () {
    Route::post('tourist/login', 'login');
    Route::post('tourist/register', 'register');
    Route::post('tourist/logout', 'logout');
    Route::post('tourist/refresh', 'refresh');
    Route::get('tourist/me', 'me');

});

Route::controller(Admincontroller::class)->group(function () {
    Route::post('admin/login', 'login');
    Route::post('admin/register', 'register');
    Route::post('admin/logout', 'logout');
    Route::post('admin/refresh', 'refresh');
    Route::get('admin/me', 'me');
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::post('/restaurants', [RestaurantController::class, 'store']);
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
Route::put('/restaurants/{id}', [RestaurantController::class, 'update']);
Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);


Route::get('/restaurant-images', [RestaurantImageController::class, 'index']);
Route::post('/restaurant-images', [RestaurantImageController::class, 'store']);
Route::get('/restaurant-images/{id}', [RestaurantImageController::class, 'show']);
Route::put('/restaurant-images/{id}', [RestaurantImageController::class, 'update']);
Route::delete('/restaurant-images/{id}', [RestaurantImageController::class, 'destroy']);

//
//Route::post('/restaurants/{restaurant}/bookings', [\App\Http\Controllers\Restaurant\RestaurantBookingController::class, 'store']);

//Route::group(['middleware' => 'jwt.auth'], function () {
//    Route::get('/bookings', 'RestaurantBookingController@index');
//Route::post('/bookings', 'RestaurantBookingController@store');
//Route::get('/bookings/{id}', 'RestaurantBookingController@show');
//Route::put('/bookings/{id}', 'RestaurantBookingController@update');
//Route::delete('/bookings/{id}', 'RestaurantBookingController@destroy');
//});

Route::middleware('auth:api')->post('/booking', [RoomBookingController::class, 'store']);
Route::middleware('auth:api')->post('/booking-rest', [RestaurantBookingController::class, 'store']);
Route::middleware('auth:api')->get('/tourist-booking', [RestaurantBookingController::class, 'store']);















//Restaurants_bookings
//1
// Route::get('/bookingsMezc', [MezcalRestaurantBookingController::class, 'index']);
// Route::post('/bookingsMezc', [MezcalRestaurantBookingController::class, 'store']);
// Route::get('/bookingsMezc/{id}', [MezcalRestaurantBookingController::class, 'show']);
// Route::put('/bookingsMezc/{id}', [MezcalRestaurantBookingController::class, 'update']);
// Route::delete('/bookingsMezc/{id}', [MezcalRestaurantBookingController::class, 'destroy']);
// //2
// Route::get('/bookingsLeDeck', [LeDeckRestaurantBookingController::class, 'index']);
// Route::post('/bookingsLeDeck', [LeDeckRestaurantBookingController::class, 'store']);
// Route::get('/bookingsLeDeck/{id}', [LeDeckRestaurantBookingController::class, 'show']);
// Route::put('/bookingsLeDeck/{id}', [LeDeckRestaurantBookingController::class, 'update']);
// Route::delete('/bookingsLeDeck/{id}', [LeDeckRestaurantBookingController::class, 'destroy']);
// //3
// Route::get('/bookingspiazzin', [PiazziniRestaurantBookingController::class, 'index']);
// Route::post('/bookingspiazzin', [PiazziniRestaurantBookingController::class, 'store']);
// Route::get('/bookingspiazzin/{id}', [PiazziniRestaurantBookingController::class, 'show']);
// Route::put('/bookingspiazzin/{id}', [PiazziniRestaurantBookingController::class, 'update']);
// Route::delete('/bookingspiazzin/{id}', [PiazziniRestaurantBookingController::class, 'destroy']);
// //4
// Route::get('/bookingsHadr', [HadramawtAntarBookingController::class, 'index']);
// Route::post('/bookingsHadr', [HadramawtAntarBookingController::class, 'store']);
// Route::get('/bookingsHadr/{id}', [HadramawtAntarBookingController::class, 'show']);
// Route::put('/bookingsHadr/{id}', [HadramawtAntarBookingController::class, 'update']);
// Route::delete('/bookingsHadr/{id}', [HadramawtAntarBookingController::class, 'destroy']);
// //5
// Route::get('/bookingsEdward', [TheEdwardsrestaurantBooking::class, 'index']);
// Route::post('/bookingsEdward', [TheEdwardsrestaurantBooking::class, 'store']);
// Route::get('/bookingsEdward/{id}', [TheEdwardsrestaurantBooking::class, 'show']);
// Route::put('/bookingsEdward/{id}', [TheEdwardsrestaurantBooking::class, 'update']);
// Route::delete('/bookingsEdward/{id}', [TheEdwardsrestaurantBooking::class, 'destroy']);
// //6
// Route::get('/bookingsLesAmisre', [LesAmisrestaurantBookingController::class, 'index']);
// Route::post('/bookingsLesAmisre', [LesAmisrestaurantBookingController::class, 'store']);
// Route::get('/bookingsLesAmisre/{id}', [LesAmisrestaurantBookingController::class, 'show']);
// Route::put('/bookingsLesAmisre/{id}', [LesAmisrestaurantBookingController::class, 'update']);
// Route::delete('/bookingsLesAmisre/{id}', [LesAmisrestaurantBookingController::class, 'destroy']);
// //7
// Route::get('/bookingsElDahan', [ElDahanRestaurantBookingController::class, 'index']);
// Route::post('/bookingsElDahan', [ElDahanRestaurantBookingController::class, 'store']);
// Route::get('/bookingsElDahan/{id}', [ElDahanRestaurantBookingController::class, 'show']);
// Route::put('/bookingsElDahan/{id}', [ElDahanRestaurantBookingController::class, 'update']);
// Route::delete('/bookingsElDahan/{id}', [ElDahanRestaurantBookingController::class, 'destroy']);
// //8
// Route::get('/bookingsHaron', [HaronsRestaurantBookingController::class, 'index']);
// Route::post('/bookingsHaron', [HaronsRestaurantBookingController::class, 'store']);
// Route::get('/bookingsHaron/{id}', [HaronsRestaurantBookingController::class, 'show']);
// Route::put('/bookingsHaron/{id}', [HaronsRestaurantBookingController::class, 'update']);
// Route::delete('/bookingsHaron/{id}', [HaronsRestaurantBookingController::class, 'destroy']);
// //9
// Route::get('/bookingsGarc', [GarciaRestaurantCafeController::class, 'index']);
// Route::post('/bookingsGarc', [GarciaRestaurantCafeController::class, 'store']);
// Route::get('/bookingsGarc/{id}', [GarciaRestaurantCafeController::class, 'show']);
// Route::put('/bookingsGarc/{id}', [GarciaRestaurantCafeController::class, 'update']);
// Route::delete('/bookingsGarc/{id}', [GarciaRestaurantCafeController::class, 'destroy']);
// //10
// Route::get('/bookingsOmsherif', [OmsherifRestaurantBookingController::class, 'index']);
// Route::post('/bookingsOmsherif', [OmsherifRestaurantBookingController::class, 'store']);
// Route::get('/bookingsOmsherif/{id}', [OmsherifRestaurantBookingController::class, 'show']);
// Route::put('/bookingsOmsherif/{id}', [OmsherifRestaurantBookingController::class, 'update']);
// Route::delete('/bookingsOmsherif/{id}', [OmsherifRestaurantBookingController::class, 'destroy']);
// //11
// Route::get('/bookingsSach', [SachiHeliopolisController::class, 'index']);
// Route::post('/bookingsSach', [SachiHeliopolisController::class, 'store']);
// Route::get('/bookingsSach/{id}', [SachiHeliopolisController::class, 'show']);
// Route::put('/bookingsSach/{id}', [SachiHeliopolisController::class, 'update']);
// Route::delete('/bookingsSach/{id}', [SachiHeliopolisController::class, 'destroy']);
// //12
// Route::get('/bookingsShal', [ShalaolaoRestaurantBookingController::class, 'index']);
// Route::post('/bookingsShal', [ShalaolaoRestaurantBookingController::class, 'store']);
// Route::get('/bookingsShal/{id}', [ShalaolaoRestaurantBookingController::class, 'show']);
// Route::put('/bookingsShal/{id}', [ShalaolaoRestaurantBookingController::class, 'update']);
// Route::delete('/bookingsShal/{id}', [ShalaolaoRestaurantBookingController::class, 'destroy']);
// //
// //
// //Hotels
// Route::get('/hotels', [HotelController::class, 'index']);
// Route::post('/hotels', [HotelController::class, 'store']);
// Route::get('/hotels/{id}', [HotelController::class, 'show']);
// Route::put('/hotels/{id}', [HotelController::class, 'update']);
// Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);
// //Rooms
// Route::get('/rooms', [RoomController::class, 'index']);
// Route::post('/rooms', [RoomController::class, 'store']);
// Route::get('/rooms/{id}', [RoomController::class, 'show']);
// Route::put('/rooms/{id}', [RoomController::class, 'update']);
// Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);
//booking room
// Route::post('/room-bookings', [RoomBookingController::class, 'store']);
// Route::get('/room-bookings/{id}', [RoomBookingController::class, 'show']);
// Route::put('/room-bookings/{id}', [RoomBookingController::class, 'update']);
// Route::delete('/room-bookings/{id}', [RoomBookingController::class, 'destroy']);
// Route::get('/bookings',[ RoomBookingController::class ,'index']);
// Route::post('/hotels/{hotel_id}/rooms/{room_id}/bookings', [RoomBookingController::class, 'store'] );


    // Route::get('/bookings', 'App\Http\Controllers\RoomBookingController@index');
    // Route::post('/hotels/{hotel_id}/rooms/{room_id}/bookings', 'App\Http\Controllers\RoomBookingController@store');
    // Route::get('/bookings/{booking_id}', 'App\Http\Controllers\RoomBookingController@show');

    // Route::apiResource('bookingroom', RoomBookingController::class);

