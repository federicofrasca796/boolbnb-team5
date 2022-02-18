@extends('layouts.app')
@section('content')
<div class="advanced-search py-3 px-4">
    @foreach($services as $service)
    <input type="button" class="rounded-pill" value="{{$service->name}}"></input>
    @endforeach
</div>
<div class="container_results_appartment d-flex px-4 py-3">
    <div class="col-12 col-md-6 bg-primary">
        <div class="number_results">
            <p>Roma: oltre 3000 appartamenti</p>
        </div>
        @foreach($apartments as $apartment)
        <div class=" single-apartment d-flex py-3">
            <div class="image-single h-100 overflow-hidden col-12 col-md-4">
                <a href=" class=" w-100">
                    <img src="{{asset('storage/' . $apartment->thumbnail)}}" class="w-100 " alt="...">
                </a>

            </div>
            <div class="col-12 col-md-8">
                <p>{{$apartment->address}}</p>
                <h5>{{$apartment->title}}</h5>
                <p><span>{{$apartment->square_metres}} m&sup2;-</span>
                    <span>
                        {{$apartment->number_of_rooms}} rooms-
                    </span>
                    <span>
                        {{$apartment->number_of_beds}} beds-
                    </span>
                    <span>
                        {{$apartment->number_of_baths}} baths
                    </span>
                </p>
                @foreach ($apartment->services as $service)
                <p><span>{{$service->name}}-</span>
                </p>
                @endforeach



            </div>

        </div>
        @endforeach
    </div>
    <div></div>

</div>


@endsection