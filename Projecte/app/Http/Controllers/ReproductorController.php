<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;

class ReproductorController extends Controller
{
    public function reproductor()
    {
        $video = Video::where('room_id', 1)->orderByDesc('id')->first();

        if ($video) {
            $data["video"] = $video->link;

            return view('reproductor', $data);
        } else {
            $data["video"] = "jtyFdK2Y33s";

            return view('reproductor', $data);
        }
    }
}
