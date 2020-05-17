<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');
// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::post('/confirmClients', 'HomeController@show');
Route::post('/saveClients', 'HomeController@save');
Route::get('/mybooking', 'HomeController@mybooking');


Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/dashboard','Admin\DashBoardController@index');
    Route::get('/usersRole','Admin\DashBoardController@usersRoles');
    Route::get('/editUR/{id}','Admin\DashBoardController@usersRolesEdit');
    Route::put('/editURUpdate/{id}','Admin\DashBoardController@urUpdate');
    Route::delete('/deleteUR/{id}','Admin\DashBoardController@deleteUR');

    Route::get('/roomTypes','Admin\RoomTypesController@index');
    Route::post('/saveRoomTypes','Admin\RoomTypesController@save');
    Route::get('/editRoomTypes/{id}','Admin\RoomTypesController@edit');
    Route::put('/updateRoomTypes/{id}','Admin\RoomTypesController@update');
    Route::delete('/deleteRoomTypes/{id}','Admin\RoomTypesController@delete');

    Route::get('/paymentMethods','Admin\PaymentMethodsController@index');
    Route::post('/savePaymentMethods','Admin\PaymentMethodsController@save');
    Route::get('/editPaymentMethods/{id}','Admin\PaymentMethodsController@edit');
    Route::put('/updatePaymentMethods/{id}','Admin\PaymentMethodsController@update');
    Route::delete('/deletePaymentMethods/{id}','Admin\PaymentMethodsController@delete');

    Route::get('/rooms','Admin\RoomsController@index');
    Route::get('/roomsReport','Admin\RoomsController@report');
    Route::get('/rooms/{id}','Admin\RoomsController@show');
    Route::post('/saveRooms','Admin\RoomsController@save');
    Route::get('/editRooms/{id}','Admin\RoomsController@edit');
    Route::put('/updateRooms/{id}','Admin\RoomsController@update');
    Route::delete('/deleteRooms/{id}','Admin\RoomsController@delete');

    Route::get('/hotelFacilities','Admin\HotelFacilitiesController@index');
    Route::post('/saveHotelFacilities','Admin\HotelFacilitiesController@save');
    Route::get('/editHotelFacilities/{id}','Admin\HotelFacilitiesController@edit');
    Route::put('/updateHotelFacilities/{id}','Admin\HotelFacilitiesController@update');
    Route::delete('/deleteHotelFacilities/{id}','Admin\HotelFacilitiesController@delete');

    Route::get('/extraServices','Admin\ExtraServicesController@index');
    Route::post('/saveExtraServices','Admin\ExtraServicesController@save');
    Route::get('/editExtraServices/{id}','Admin\ExtraServicesController@edit');
    Route::put('/updateExtraServices/{id}','Admin\ExtraServicesController@update');
    Route::delete('/deleteExtraServices/{id}','Admin\ExtraServicesController@delete');

    Route::get('/roomDiscounts','Admin\RoomDiscountsController@index');
    Route::post('/saveRoomDiscounts','Admin\RoomDiscountsController@save');
    Route::get('/editRoomDiscounts/{id}','Admin\RoomDiscountsController@edit');
    Route::put('/updateRoomDiscounts/{id}','Admin\RoomDiscountsController@update');
    Route::delete('/deleteRoomDiscounts/{id}','Admin\RoomDiscountsController@delete');

    Route::get('/bookings','Admin\BookingsController@index');
    Route::post('/showBookings','Admin\BookingsController@show');
    Route::post('/saveBookings','Admin\BookingsController@save');
    Route::get('/editBookings/{id}','Admin\BookingsController@edit');
    Route::put('/updateBookings/{id}','Admin\BookingsController@update');
    Route::delete('/deleteBookings/{id}','Admin\BookingsController@delete');

    Route::get('/bookingapprovals','Admin\BookingsController@approval');
    Route::get('/bookingreport','Admin\BookingsController@report');
    
    Route::put('/approveBookings/{id}','Admin\BookingsController@approve');
    Route::put('/declineBookings/{id}','Admin\BookingsController@decline');
});

