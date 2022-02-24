<?php

namespace App\Http\Controllers;

use App\Mail\InfoApartmentMail;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
        
        return view('guest.formMessage', compact('apartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated_Data = $request->validate([
            'name' => 'required|min:3|max:80',
            'mail' => 'required',
            'body' => 'required|min:30',
            'apartment_id' => 'nullable|exists:apartments,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        $message = Message::create($validated_Data);

        Message::create($validated_Data);

        /* return (new InfoApartmentMail($message))->render(); */

        Mail::to('boolbnb@admin.com')->send(new InfoApartmentMail($message));
        return redirect()->back()->with(session()->flash('success', "Message send succesfully"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
