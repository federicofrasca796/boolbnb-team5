<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ApartmentResource(Apartment::OrderBy('id', 'desc')->with(['sponsors'])->has('sponsors')->where('is_aviable', 1)->get());
    }
}