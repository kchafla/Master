<?php

namespace App\Http\Controllers;

use App\Models\Joined;
use App\Models\Room;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JoinedController extends Controller
{
    public function invitacion($id, $token)
    {
        $sala = Room::where('id', $id)->first();

        if ($token == $sala->token) {
            $check = Joined::where([['user_id', Auth::id()], ['room_id', $id]])->first();

            if (!$check && $sala->user_id != Auth::id()) {
                $joined = new Joined;
                $joined->setAttribute("room_id", $id);
                $joined->setAttribute("user_id", Auth::id());
                $joined->save();
            } 

            return redirect("sala/".$id);
        } else {
            return redirect("dashboard");
        }        
    }
}
