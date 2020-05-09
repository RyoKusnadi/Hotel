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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//Temporary Make This Due doesnt need Client side
// Route::get('/home', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    
    Route::get('/usersRole','Admin\DashBoardController@usersRoles');
    Route::get('/editUR/{id}','Admin\DashBoardController@usersRolesEdit');
    Route::put('/editURUpdate/{id}','Admin\DashBoardController@urUpdate');
    Route::delete('/deleteUR/{id}','Admin\DashBoardController@deleteUR');

    Route::get('/roomTypes','Admin\RoomTypesController@index');
    Route::post('/saveRoomTypes','Admin\RoomTypesController@save');
    Route::get('/editRoomTypes/{id}','Admin\RoomTypesController@edit');
    Route::put('/updateRoomTypes/{id}','Admin\RoomTypesController@update');
    Route::delete('/deleteRoomTypes/{id}','Admin\RoomTypesController@delete');

    Route::get('/roomPrices','Admin\RoomPricesController@index');
    Route::post('/saveRoomPrices','Admin\RoomPricesController@save');
    Route::get('/editRoomPrices/{id}','Admin\RoomPricesController@edit');
    Route::put('/updateRoomPrices/{id}','Admin\RoomPricesController@update');
    Route::delete('/deleteRoomPrices/{id}','Admin\RoomPricesController@delete');
});

