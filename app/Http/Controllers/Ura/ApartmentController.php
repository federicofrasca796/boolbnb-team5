<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $apartments = Apartment::where('user_id' , Auth::user()->id); */
        $apartments = Apartment::all();
        return view('ura.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ura.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request); */
        $validator = $request->validate([
            'title' => 'required|max:150',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif,bmp,svg,webp|max:1024',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'number_of_rooms' => 'required|numeric|max:120|min:1',
            'number_of_beds' => 'required|numeric|max:120|min:1',
            'number_of_baths' => 'required|numeric|max:120|min:1',
            'square_metres' => 'required|numeric|min:1',
            'is_aviable' => 'boolean|required',
            /*'sponsor_id' => 'required|numeric|exists:sponsors,id, */
        ]);

        if ($request->file('thumbnail')) {
            $image_path = Storage::put('apartments_img', $request->file('thumbnail'));

            $validator['thumbnail'] = $image_path;

        }

        $validator['slug'] = Str::slug($request->title);
        //$validator['user_id'] = Auth::user()->id;
        Apartment::create($validator);
        return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Apartment '$request->title' created succesfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //ddd($apartment);
        return view('ura.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        /* if($apartment->user_id != Auth::user()->id){
        // Check if user has permissions to this apartment
        return redirect()->back()->with(session()->flash('error' , 'Access Denied'));
        } */
        //ddd($apartment);
        return view('ura.apartments.edit', compact('apartment'));
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
        $validator = $request->validate([
            'title' => 'required|max:150',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif,bmp,svg,webp|max:1024',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'number_of_rooms' => 'required|numeric|max:120|min:1',
            'number_of_beds' => 'required|numeric|max:120|min:1',
            'number_of_baths' => 'required|numeric|max:120|min:1',
            'square_metres' => 'required|numeric|min:1',
            'is_aviable' => 'boolean|required',
            /* 'sponsor_id' => 'required|numeric|exists:sponsors,id, */
        ]);

        if ($request->file('thumbnail')) {
            Storage::delete($apartment->thumbnail);

            $image_path = Storage::put('apartments_img', $request->file('thumbnail'));

            $validator['thumbnail'] = $image_path;

        }

        $validator['slug'] = Str::slug($request->title);

        $apartment->update($validator);
        return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Apartment '$apartment->title' edited succesfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        /* if($apartment->user_id != Auth::user()->id){
        // Check if user has permissions to this apartment
        return redirect()->back()->with(session()->flash('error' , 'Access Denied'));
        } */
        Storage::delete($apartment->thumbnail);
        $apartment->delete();

        return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Apartment '$apartment->title' deleted succesfully"));
    }
}
