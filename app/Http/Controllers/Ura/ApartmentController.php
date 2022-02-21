<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //$apartments = Apartment::where('user_id', Auth::user()->id);
        $apartments = Auth::user()->apartment()->orderBy('id', 'desc')->paginate(4);

        //$apartments = Apartment::all();
        return view('ura.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('ura.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif,bmp,svg,webp|max:1024',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'number_of_rooms' => 'required|numeric|max:120|min:1',
            'number_of_beds' => 'required|numeric|max:120|min:1',
            'number_of_baths' => 'required|numeric|max:120|min:1',
            'square_metres' => 'required|numeric|min:1',
            'is_aviable' => 'boolean',
            /*'sponsor_id' => 'required|numeric|exists:sponsors,id, */
            'services' => 'required|exists:services,id',
        ]);

        if ($request->file('thumbnail')) {
            $image_path = Storage::put('apartments_img', $request->file('thumbnail'));

            $validator['thumbnail'] = $image_path;
        }

        $latest = DB::table('apartments')->latest()->first()->id + 1;
        $validator['slug'] = Str::slug($request->title) . '_' . $latest;
        //$validator['user_id'] = Auth::user()->id;
        //$new_apartment = Apartment::create($validator);
        //$new_apartment->services()->attach($validator['services']);

        $validator['user_id'] = Auth::user()->id;

        // ddd($request, $validator);
        $new_apartment = Apartment::create($validator);
        $new_apartment->services()->attach($validator['services']);
        //ddd($new_apartment);
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
        if (Auth::id() === $apartment->user_id) {
            $services = Service::all();
            return view('ura.apartments.edit', compact('apartment', 'services'));
        } else {
            abort(403);
        }
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
        if (Auth::id() === $apartment->user_id) {
            $validator = $request->validate([
                'title' => 'required|max:150',
                'thumbnail' => 'nullable|mimes:jpeg,jpg,png,gif,bmp,svg,webp|max:1024',
                'address' => 'required',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'number_of_rooms' => 'required|numeric|max:120|min:1',
                'number_of_beds' => 'required|numeric|max:120|min:1',
                'number_of_baths' => 'required|numeric|max:120|min:1',
                'square_metres' => 'required|numeric|min:1',
                'is_aviable' => 'boolean|required',
                'services' => 'required|exists:services,id',
                /* 'sponsor_id' => 'required|numeric|exists:sponsors,id, */
            ]);

            if ($request->file('thumbnail')) {
                Storage::delete($apartment->thumbnail);

                $image_path = Storage::put('apartments_img', $request->file('thumbnail'));

                $validator['thumbnail'] = $image_path;
            }

            $validator['slug'] = Str::slug($request->title);
            $apartment->services()->sync($validator['services']);

            $apartment->update($validator);
            return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Apartment '$apartment->title' edited succesfully"));
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        if (Auth::id() === $apartment->user_id) {
            Storage::delete($apartment->thumbnail);
            $apartment->delete();

            return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Apartment '$apartment->title' deleted succesfully"));
        } else {
            abort(403);
        }
    }

    public function makeVisible(Apartment $apartment, Request $request)
    {
        if (Auth::id() === $apartment->user_id) {
            $validator = $request->validate([
                'is_aviable' => 'max:1|boolean|required',
            ]);
            $apartment->update($validator);
            return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Apartment '$apartment->title' edited succesfully"));

        }
    }
}
