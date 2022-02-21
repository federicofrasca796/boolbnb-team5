<?php

namespace App\Http\Controllers;

use App\Models\Apartment;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartments = Apartment::where('is_aviable', '1')->get();
        //$apartments = Apartment::all();
        return view('guest.index', compact('apartments'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {

        return view('guest.show', compact('apartment'));
    }
}
