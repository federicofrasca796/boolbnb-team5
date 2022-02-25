<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $apartments = Auth::User()->apartment(); */
        $messages = Message::where('user_id', Auth::User()->id)->paginate(5);
       /*  ddd($messages); */
        return view('ura.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('ura.messages.show', compact('message'));
    }
}
