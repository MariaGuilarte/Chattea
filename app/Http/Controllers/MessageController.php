<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\CreatedMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
      return view('messages.index', ['sender' => Auth::id()]);
    }

    public function create()
    {
      
    }

    public function store(Request $request){
      $message = new Message([
        "body" => $request->body,
        "sender" => Auth::id(),
        "receiver" => $request->receiver
      ]);
      
      if( $message->save() ){
        event( new CreatedMessage( $message ) );
      }
    }

    public function show(Message $message)
    {
      
    }

    public function edit(Message $message)
    {
      
    }

    public function update(Request $request, Message $message)
    {
        //
    }
    
    public function destroy(Message $message)
    {
        //
    }
}
