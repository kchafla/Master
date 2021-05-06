<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;

class ReproductorController extends Controller
{
    public function reproductor()
    {
        $data["video"] = Video::where('room_id', 1)->orderByDesc('id')->first();

        return view('reproductor', $data);
    }
}
