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
            'apartment_id' => 'required|exists:apartments,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $message = Message::create($validated_Data);

        /* Add a render email */
        /* return (new InfoApartmentMail($message))->render(); */

        Mail::to('boolbnb@admin.com')->send(new InfoApartmentMail($message));

        return redirect()->back()->with(session()->flash('success', "Message send succesfully"));

    }
}
