<?php /** @noinspection DuplicatedCode */

namespace App\Http\Controllers\apiControllers;

use App\Models\conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait conversationApi
{
    public function get_conversations(Request $request)
    {
        $user = Auth::user();

        $conversations = $user->doctor;

        return $conversations;
    }

    public function send_message(Request $request)
    {
        $from = Auth::user();
        $conversation = conversation::where('doctor_id',$request['conversation_id'])->where('patient_id',Auth::user()->id)->get();
        $to = User::find($request['conversation_id']);

        $text = $request['text'];


        $message = new Message();

        $message->conversation_id = $conversation[0]->id;
        $message->from = $from->id;
        $message->to = $to->id;
        $message->text = $text;

        $message->save();

        return $conversation[0]->messages()->get();
    }

    public function receive_msg(Request $request)
    {
        $from = Auth::user();
        $conversation = conversation::where('doctor_id',$request['conversation_id'])->where('patient_id',Auth::user()->id)->get();

        return $conversation[0]->messages()->get();
    }
}
