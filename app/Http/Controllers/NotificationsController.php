<?php

namespace App\Http\Controllers;

use App\Models\conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NotificationsController extends Controller
{
    public function index()
    {
        $all_conversations = conversation::with('patients')->where('doctor_id', Auth::user()->id)->get();
        $conversation = conversation::with(['patients', 'messages'])->where('doctor_id', Auth::user()->id)->first();

        return Inertia::render('Dashboard/Notifications/index', [
            'all_conversations' => $all_conversations,
            'active_conversation' => $conversation
        ]);
    }

    public function select_conversation(Request $request, $id)
    {
        $all_conversations = conversation::with('patients')->where('doctor_id', Auth::user()->id)->get();
        $conversation = conversation::with(['patients', 'messages'])->where('id', $id)->first();

        return Inertia::render('Dashboard/Notifications/index', [
            'all_conversations' => $all_conversations,
            'active_conversation' => $conversation
        ]);
    }

    public function created_chat($conversation, $all_conversations)
    {
        return Inertia::render('Dashboard/Notifications/index', [
            'all_conversations' => $all_conversations,
            'active_conversation' => $conversation
        ]);
    }


    public function send_msg(Request $request)
    {
        $to = User::find($request['to']);
        $from = Auth::user();
        $conversation = conversation::find($request['conversation_id']);
        $text = $request['text'];


        $message = new Message();

        $message->conversation_id = $conversation->id;
        $message->from = $from->id;
        $message->to = $to->id;
        $message->text = $text;

        $message->save();

        return $conversation->messages()->get();
    }
}
