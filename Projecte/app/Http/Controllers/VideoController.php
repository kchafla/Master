<?php

namespace App\Http\Controllers;

use App\Models\Video;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Events\NewVideoNotification;

class VideoController extends Controller
{
    public function newvideo(Request $request, $id)
    {
        $last = Video::where('room_id', $id)->orderByDesc('id')->first();

        $video = new Video;
        $video->setAttribute("room_id", $id);
        $video->setAttribute("user_id", Auth::id());
        $video->setAttribute("link", $request->link);

        if (!$last || $last->link != $request->link) {
            $video->save();
        }

        event(new NewVideoNotification($video));

        return back();
    }
}
