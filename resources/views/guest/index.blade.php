@extends ('layouts.app')
@section('content')
@include('partials.jumbo')
<div class="sponsor_title my-5 text-center">
    <h1>Explore our best apartments</h1>
</div>



<div class=" container-apartments row m-auto row-cols-1 row-cols-md-4 g-4">
    @foreach ($apartments as $apartment)
    <div class="col">
        <div class="card overflow-hidden">
            <a href="{{route('guest.show', $apartment->slug)}}">

                <img src="{{$apartment->thumbnail}}" class="w-100 " alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$apartment->title}}</h5>
                </div>
            </a>

        </div>
    </div>



    @endforeach
</div>


@endsection