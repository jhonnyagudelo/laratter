<?php

namespace App\Http\Controllers;


use App\Message;
use App\Http\Requests\MessagesRequest;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function create(MessagesRequest $request, Message $message){
        $user = $request->user();
        $image = $request->file('image');
        $message = Message::create([
            'user_id' => $user->id,
            'image' => $image->store('message','public'),
        ]+ $request->all());
 
        $message->save();
        // dd($request);
        return redirect('/messages/'.$message->id)->withSuccess('Creado con exito');
    }

    public function show(Message $message){
        // $message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }
    //busquedas en laravel
    public function search(Request $Request){
        $query = $Request->input('query');
        //with mejora la query een menos lineas
        //Busqueda con query
        $messages = Message::with('user')->where('content', 'LIKE', "%$query%")->get();
        // $messages = Message::search($query)->paginate();
        // $messages->load('user');

        // return view('messages.index', compact('messages'));        
    }

    //respondes mesajes
    public function responses(Message $message){
        return $message->responses;
    }

}
