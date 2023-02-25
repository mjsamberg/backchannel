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
    return view('home');
});

Route::get('home', function () {
    return redirect('/dashboard');
});

Auth::routes();

Route::post('/room','App\Http\Controllers\RoomsController@display_room_form')->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\RoomsController@dashboard')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->post('/room/create', 'App\Http\Controllers\RoomsController@create')->name('room.create');
Route::middleware(['auth:sanctum', 'verified'])->get('/room/enabled/{id}', 'App\Http\Controllers\RoomsController@toggle_enabled')->name('room.enabled');
Route::middleware(['auth:sanctum', 'verified'])->get('/room/anonymous/{id}', 'App\Http\Controllers\RoomsController@toggle_anonymous')->name('room.anonymous');
Route::get('/{slug}', 'App\Http\Controllers\RoomsController@display_room')->name('room.display');
