<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Apartment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        return view('guest.advanced-search', compact('apartments', 'services'));
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //
    }
}
