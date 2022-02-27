@extends('layouts.ura')

@section('content')


<div class="ura_message_header w-100 py-4 mb-2">
    <div class="w-85 m-auto">
        <h1 class="text-white">All Sponsorships</h1>
    </div>
</div>
<div class="container_ura_index my-5  p-2 p-md-0 m-auto">

@foreach($apartment_sponsored as $apartment)
@if($apartment->sponsors()->count() > 0)

<div class="table w-100">
        <div class="thead w-100">
            <div class="table-row w-100 d-flex">
                <div class="table-cell col-1 d-none d-md-block">Apartment</div>
                <div class="table-cell col-2 d-none d-md-block">Sponsorship Plan</div>
                <div class="table-cell col-md-3 col-5">Expires on</div>
            </div>
        </div>
        <div class="tbody">
        @foreach($apartment->sponsors as $sponsor)
            <a>
                <div class="table-row w-100 d-flex {{$loop->odd ? 'bg-lightgrey' : ''}}">
                    <div class="table-cell col-1 d-none d-md-block">{{ $apartment->title }}</div>
                    <div class="table-cell col-2 d-none d-md-block">{{ $sponsor->name }}</div>
                    <div class="table-cell col-md-3 col-5"></div>
                </div>
            </a>
        @endforeach
        </div>

    </div>
 
@endif



@endforeach

</div>









@endsection