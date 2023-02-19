<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','App\Http\Controllers\RoomsController@dashboard')->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\RoomsController@dashboard')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/room/create', 'App\Http\Controllers\RoomsController@create')->name('room.create');
Route::get('/{slug}', 'App\Http\Controllers\RoomsController@display_room')->name('room.display');
Route::post('/room', 'App\Http\Controllers\RoomsController@display_room_form')->name('room.display.post');
