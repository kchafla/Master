    <?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

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
        $messages = Message::where("chat_id", $request->chat)->get();
        $users = User::get();

        $data["messages"] = array();
        $data["times"] = array();

        for ($n=0; $n < count($messages); $n++) {
            $message = $messages[$n];
            foreach ($users as $key => $value) {
                if ($value->id == $message->user_id) {
                    $user = $value;
                }
            }

            array_push($data["messages"], $user->name.": ".$message->message);
            array_push($data["times"], "Enviat el dia ".substr($message->created_at, 0, 10)." a les ".substr($message->created_at, 11).".");
        }

        return $data;
    }
}
