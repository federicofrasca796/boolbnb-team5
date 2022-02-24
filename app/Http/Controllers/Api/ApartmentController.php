<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Resources\ApartmentResource;
use App\Models\Service;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //THIS METHOD NEEDS TO BE UPDATED WITH SPONSORED APARTMENTS

        /*  Syntax: '/apartments?address=city' 

         // Filter apartments by address
         if (request()->address) {
            $filtered = Apartment::where('address', 'like', '%' . request()->address . '%')->with(['services'])->orderBy('id', 'desc')->paginate(4);
            return new ApartmentResource($filtered);
        }

        // Catch error
         return response([
            'status' => 'error',
            'description' => 'Missing required parameter ADDRESS.'
        ], 422); */

        return new ApartmentResource(Apartment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return Apartment::where('slug', $apartment->slug)->with(['services'])->first();
    }

    /**
     * Display the researched resource based on address.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function search(String $address)
    {
        // Catch error
        if (!request()->address) {
            return response([
                'status' => 'error',
                'description' => 'Missing required parameter ADDRESS.'
            ], 422);
        }
        return Apartment::where('address', 'like', '%' . $address . '%')->with(['services'])->paginate(8);
    }

    /**
     * Display the researched resource based on address and service.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function searchadv(String $address, String $services)
    {
        // Catch errors
        if (!request()->address) {
            return response([
                'status' => 'error',
                'description' => 'Missing required parameter ADDRESS.'
            ], 422);
        } elseif (!request()->services) {
            return response([
                'status' => 'error',
                'services' => 'Missing required parameter SERVICES.'
            ], 422);
        }

        //transform param string into array
        $services = explode('+', $services);

        //filter query
        $filtered = Apartment::with(['services'])
            ->whereHas('services', function ($query) use ($services) {
                $query->whereIn('slug', $services);
            }, '=', count($services))
            ->where('address', 'like', '%' . $address . '%');

        return new ApartmentResource($filtered->paginate(8));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}