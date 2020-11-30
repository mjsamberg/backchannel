<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\RoomsController@dashboard')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/room', 'App\Http\Controllers\RoomsController@create')->name('room.create');
Route::get('/{slug}', 'App\Http\Controllers\RoomsController@display_room')->name('room.display');
Route::post('/room', 'App\Http\Controllers\RoomsController@display_room_form')->name('room.display.post');