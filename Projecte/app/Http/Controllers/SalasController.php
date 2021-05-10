<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Video;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    public function recoversalas() {
        $data["salas"] = array();
        $data["videos"] = array();

        $salas = Room::where('user_id', Auth::id())->get();
        
        foreach ($salas as $key => $sala) {
            $last = Video::where('room_id', $sala->id)->orderByDesc('id')->first();

            array_push($data["salas"], $sala);
            if ($last != null) {
                array_push($data["videos"], $last->link);
            } else {
                array_push($data["videos"], "jtyFdK2Y33s");
            }
            
        }

        return view("dashboard", $data);
    }
}
