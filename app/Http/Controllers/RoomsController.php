<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    //
    public function CheckAvailableRooms($client_id) {
        return view('rooms/checkAvailableRooms');
    }
}
