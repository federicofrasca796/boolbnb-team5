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

        return new ApartmentResource(Apartment::paginate(8));
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
    public function search(String $address, String $coords)
    {
        // ddd($address, $coords);

        //Set variables
        $apartments = Apartment::with(['services', 'sponsors'])->get();
        $coords_arr = explode('+', $coords);
        $lat1 = $coords_arr[0];
        $lon1 = $coords_arr[1];
        $dist_results = [];

        /* Distance Calculator */
        foreach ($apartments as $apartment) {
            $earthRadius = 6371;
            $latFrom = deg2rad($apartment->latitude);
            $lonFrom = deg2rad($apartment->longitude);
            $latTo = deg2rad($lat1);
            $lonTo = deg2rad($lon1);
            $lonDelta = $lonTo - $lonFrom;
            $a = pow(cos($latTo) * sin($lonDelta), 2) +
                pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
            $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
            $angle = atan2(sqrt($a), $b);
            $distance = $angle  * $earthRadius;
            if ($distance <= 50) {
                $apartment->distance = $distance;
                array_push($dist_results, $apartment);
            }
        }

        return $dist_results;
    }

    /**
     * Display the researched resource based on address and service.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function searchadv(String $address, String $coords, String $services)
    {

        //transform param string into array
        $services = explode(',', $services);

        //filter db query
        $filtered = Apartment::with(['services', 'sponsors'])
            ->whereHas('services', function ($query) use ($services) {
                $query->whereIn('slug', $services);
            }, '=', count($services))->get();

        // ddd($filtered);
        //set variables
        $coords_arr = explode('+', $coords);
        $lat1 = $coords_arr[0];
        $lon1 = $coords_arr[1];
        $dist_results = [];

        /* Distance Calculator */
        foreach ($filtered as $apartment) {
            $earthRadius = 6371;
            $latFrom = deg2rad($apartment->latitude);
            $lonFrom = deg2rad($apartment->longitude);
            $latTo = deg2rad($lat1);
            $lonTo = deg2rad($lon1);
            $lonDelta = $lonTo - $lonFrom;
            $a = pow(cos($latTo) * sin($lonDelta), 2) +
                pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
            $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
            $angle = atan2(sqrt($a), $b);
            $distance = $angle  * $earthRadius;
            if ($distance <= 50) {
                $apartment->distance = $distance;
                array_push($dist_results, $apartment);
            }
        }

        return $dist_results;

        // return new ApartmentResource($filtered->paginate(8));
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