<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Chat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function newroom()
    {
        $room = new Room;
        $room->setAttribute("user_id", Auth::id());
        $room->setAttribute("name", uniqid());
        $room->save();

        $chat = new Chat;
        $chat->setAttribute("room_id", $room->id);
        $chat->save();

        return back();
    }
}
