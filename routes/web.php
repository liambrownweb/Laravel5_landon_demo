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

Route::get('/', 'ContentsController@home');
Route::get('/clients', 'ClientController@index');
Route::get('/clients/new', 'ClientController@newClient');
Route::post('/clients/new', 'ClientController@create');
Route::get('/clients/{client_id}', 'ClientController@show');
Route::post('/clients/{client_id}', 'ClientController@modify');

Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');

Route::get('/about', function () {
    $response_arr = [];
    $response_arr['author'] = 'BP';
    $response_arr['version'] = '0.1.1';
    return $response_arr;
    //return '<h3>About</h3>';
});

Route::get('/home', function () {
    $data = [];
    $data['version'] = '0.1.1';
    return view('welcome', $data);
});

Route::get('/di', 'ClientController@di');

Route::get('/facades/db', function () {
    return DB::select('SELECT * from table');
});

Route::get('/facades/encrypt', function () {
    return Crypt::encrypt('123456789');
});

Route::get('/facades/decrypt', function () {
    return Crypt::decrypt('eyJpdiI6Ik54UkxUZjNVb2ZoemlLeUxXd0pzcHc9PSIsInZhbHVlIjoiVkx4SFRLNy9KOHNrT3VRSWgzdThsN1FMU0RiNVd6Uy90a3JFTWh5R3FSZz0iLCJtYWMiOiIwYTU3ZmJjNmVhODNjOWZjN2Q1NDE1NGUwYjk2ZGEyY2NhNDRiZjAwMTdkMjM2ZmFiY2I5Y2QyZWM0Y2MwMmM0In0');
});
