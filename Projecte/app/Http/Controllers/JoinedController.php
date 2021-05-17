<?php

namespace App\Http\Controllers;

use App\Models\Joined;
use App\Models\Room;
use App\Models\User;

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

    public function recoverusers($id)
    {
        $joineds = Joined::where("room_id", $id)->get();
        $users = User::get();

        $data["joineds"] = array();
        $data["users"] = array();

        $room = Room::where("id", $id)->first();
        $owner = User::where("id", $room->user_id)->first();
        $data["owner"] = $owner->name;


        for ($n=0; $n < count($joineds); $n++) {
            $joined = $joineds[$n];
            foreach ($users as $key => $value) {
                if ($value->id == $joined->user_id) {
                    $user = $value;
                }
            }

            array_push($data["joineds"], $joined->id);
            array_push($data["users"], $user->name);
        }

        return $data;
    }
}
