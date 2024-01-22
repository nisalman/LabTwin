<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FindAndGoController;
use App\Http\Controllers\RoomController;

use App\Models\Instrument;
use App\Models\Property;
use App\Models\User;
use App\Models\Relate;
use App\Models\InstrumentProperty;


use App\Models\Room;
use App\Models\Building;
use App\Models\Place;

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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/find', [App\Http\Controllers\FindAndGoController::class, 'index'])->name('indexPage');
Route::get('/find/{id}', [App\Http\Controllers\HomeController::class, 'main'])->name('main');
Route::post('find/take', [App\Http\Controllers\InstrumentController::class, 'changePlace']);
Route::get('find/getRooms/{id}', [App\Http\Controllers\InstrumentController::class, 'getRoomsByBuildings']);
Route::get('place/edit/find/getRooms/{id}', [App\Http\Controllers\InstrumentController::class, 'getRoomsByBuildings']);
Route::get('place/find/getRooms/{id}', [App\Http\Controllers\InstrumentController::class, 'getRoomsByBuildings']);
Route::get('find/getPlaces/{id}', [App\Http\Controllers\InstrumentController::class, 'getPlacesByRooms']);
Route::get('/search', [App\Http\Controllers\FindAndGoController::class, 'getSearch'])->name('getSearch');
Route::get('/testSearch', [App\Http\Controllers\FindAndGoController::class, 'testSearch'])->name('testSearch');
Route::get('/keysight', [App\Http\Controllers\HomeController::class, 'keysight'])->name('keysight');
Route::post('/find/barcodeNumber', [App\Http\Controllers\HomeController::class, 'generateBarCode'])->name('generateBarCode');
Route::get('/home', [App\Http\Controllers\FindAndGoController::class, 'index'])->name('indexPage');

Route::controller(SearchController::class)->group(function () {
    Route::get('demo-search', 'index');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/add-instrument', [App\Http\Controllers\InstrumentController::class, 'create'])->name('instrument.create');
    Route::post('/instrument-create', [App\Http\Controllers\InstrumentController::class, 'instrumentCreate'])->name('instrument.instrumentCreate');


    Route::get('place', [App\Http\Controllers\PlaceController::class, 'index'])->name('place.list');
    Route::get('place/create', [App\Http\Controllers\PlaceController::class, 'create']);
    Route::post('place/store', [App\Http\Controllers\PlaceController::class, 'store']);
    Route::get('place/edit/{id}', [App\Http\Controllers\PlaceController::class, 'edit']);
    Route::post('place/update/{id}', [App\Http\Controllers\PlaceController::class, 'update']);
    Route::get('place/delete/{id}', [App\Http\Controllers\PlaceController::class, 'delete']);


    Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('room.list');
    Route::get('room/create', [App\Http\Controllers\RoomController::class, 'create']);
    Route::post('room/store', [App\Http\Controllers\RoomController::class, 'store']);
    Route::get('room/edit/{id}', [App\Http\Controllers\RoomController::class, 'edit']);
    Route::post('room/update/{id}', [App\Http\Controllers\RoomController::class, 'update']);
    Route::get('room/delete/{id}', [App\Http\Controllers\RoomController::class, 'delete']);

    Route::get('/building', [App\Http\Controllers\BuildingController::class, 'index'])->name('building.list');
    Route::get('building/create', [App\Http\Controllers\BuildingController::class, 'create']);
    Route::post('building/store', [App\Http\Controllers\BuildingController::class, 'store']);
    Route::get('building/edit/{id}', [App\Http\Controllers\BuildingController::class, 'edit']);
    Route::post('building/update/{id}', [App\Http\Controllers\BuildingController::class, 'update']);
    Route::get('building/delete/{id}', [App\Http\Controllers\BuildingController::class, 'delete']);

});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

