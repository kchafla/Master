<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Video;
use App\Models\Chat;

class ReproductorController extends Controller
{
    public function reproductor($id)
    {
        $sala = Room::where('id', $id)->orderByDesc('id')->first();
        if ($sala) {
            $data["sala"] = $sala;

            $video = Video::where('room_id', $id)->orderByDesc('id')->first();

            $chat = Chat::where('room_id', $id)->orderByDesc('id')->first();
            $data["chat"] = $chat->id;

            if ($video) {
                $data["video"] = $video->link;

                return view('reproductor', $data);
            } else {
                $data["video"] = "jtyFdK2Y33s";

                return view('reproductor', $data);
            }
        } else {
            abort(404);
        }
    }
}
