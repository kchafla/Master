<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function newroom()
    {
        $room = new Room;
        $room->setAttribute("user_id", Auth::id());
        $room->setAttribute("name", uniqid());
        $room->save();

        return back();
    }
}
