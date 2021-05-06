<?php

namespace App\Http\Controllers;

use App\Models\Message;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Events\NewMessageNotification;

class MessageController extends Controller
{
    public function newmessage(Request $request)
    {
        $message = new Message;
        $message->setAttribute("chat_id", $request->chat);
        $message->setAttribute("user_id", Auth::id());
        $message->setAttribute("message", $request->body);
        $message->save();

        event(new NewMessageNotification($message));

        return back();
    }

    public function recovermessage(Request $request)
    {
        return Message::where("chat_id", $request->chat)->get();
    }
}
