@extends('layouts.app')
@section('content')
<div class="container-advanced-search">
    <div class="advanced-search py-3 px-4">
        @foreach($services as $service)
        <input type="button" class="rounded-pill" value="{{$service->name}}">
        @endforeach
    </div>
    <div class="container_results_appartment d-flex flex-wrap flex-md-nowrap px-4 py-3">
        <div class="results col-12 col-md-6">
            <div class="number_results">
                <p>Roma: oltre 3000 appartamenti</p>
            </div>
            @foreach($apartments as $apartment)
            <div class=" single-apartment d-flex flex-wrap py-3">
                <div class="image-single h-100 overflow-hidden col-12 col-md-4">
                    <a href="{{route('guest.show', $apartment->slug)}}" class=" w-100">
                        <img src="{{asset('storage/' . $apartment->thumbnail)}}" class="w-100 " alt="...">
                    </a>

                </div>
                <div class="info_apartment col-12 col-md-8 ps-4 d-flex align-items-center">
                    <div>
                        <p>{{$apartment->address}}</p>
                        <h5>{{$apartment->title}}</h5>
                        <hr>
                        <p class="m-0"><span>{{$apartment->square_metres}} m&sup2;-</span>
                            <span>
                                {{$apartment->number_of_rooms}} rooms -
                            </span>
                            <span>
                                {{$apartment->number_of_beds}} beds -
                            </span>
                            <span>
                                {{$apartment->number_of_baths}} baths
                            </span>
                        </p>
                        @foreach ($apartment->services as $service)
                        <span>
                            @if($loop->last){{$service->name}}
                            @else {{$service->name}} - @endif </span>
                        @endforeach
                    </div>




                </div>

            </div>
            @endforeach
        </div>
        <div class=" mappa col-12 col-md-6">
            <img src="{{asset('storage/apartments_img/map_adavanced.png')}}" class="w-100 " alt="...">
        </div>

    </div>
</div>




@endsection