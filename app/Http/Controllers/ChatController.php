<?php


namespace App\Http\Controllers;


use App\Models\Chat\Chat;
use App\Models\Chat\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Psy\debug;

class ChatController
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $currentChat = Chat::find($request->id);

        if (empty($currentChat)) return abort(404);

        $chats = Chat::where('customer_id', $user->company_id)->orWhere('seller_id', $user->company_id)->orderByDesc('updated_at')->get();
        $messages = Message::where('chat_id', $currentChat->id)->get();
        return view('chat.index', [
            'user' => $user,
            'currentChat' => $currentChat,
            'chats' => $chats,
            'messages' => $messages,
        ]);
    }

    public function send(Request $request)
    {
        $user = auth()->user();
        $chat = Chat::find($request->id);

        $chat->updated_at = Carbon::now();
        $chat->update();


        $message = Message::create([
            'text' => $request->text,
            'chat_id' => $chat->id,
            'user_id' => $user->id
        ]);

        return redirect()->route('chat.index', [
            'id' => $chat->id
        ]);
    }

    public function read(Request $request)
    {
        if ($request->ajax()) {
            $ids = [];
            foreach ($request->ids as $id) {
                $message = Message::find($id);
                $message->is_read = true;
                $message->update();
                array_push($ids, $message->id);
            }
            return response()->json([
                'status' => 'success',
                'ids'=> $ids
            ]);
        }
        return abort(406);
    }
}
