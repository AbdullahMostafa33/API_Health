<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\v1\MessageFilter;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Resources\v1\MessageCollection;
use App\Http\Resources\v1\MessageResource;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MessageFilter();
        $filterItems = $filter->transform($request);

        $messages = Message::where($filterItems);
        return new MessageCollection($messages->paginate());
    }



    public function store(StoreMessageRequest $request)
    {
        return new MessageResource(Message::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return new MessageResource($message);
    }

    public function update(Request $request, Message $message)
    {
        $message->message_content=$request->messageContent;       
        return   $message->save();;
    }

    public function destroy(Message $message)
    {
        $message->delete();
    }

    public function last_messages(Request $request)  {
        
        $messagers1 = Message::where('receiver_id', $request->userId)->pluck('sender_id');
        $messagers2 = Message::where('sender_id', $request->userId)->pluck('receiver_id');
        $messagers = $messagers1->concat($messagers2)->unique();

        $last_messages = [];
        foreach ($messagers as $messager) {
            $x = Message::where([['receiver_id', 1], ['sender_id', $messager]])->orwhere([['sender_id', 1], ['receiver_id', $messager]])->orderBy('created_at', 'desc')->get()->first();
            $last_messages[] = $x;
        }
        return new MessageCollection( $last_messages);
    }
}
