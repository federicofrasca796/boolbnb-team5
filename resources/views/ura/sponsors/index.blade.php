@extends('layouts.ura')

@section('content')

@foreach($apartment_sponsored as $apartment)
<h1>{{$apartment->title}}</h1>

@endforeach

@endsection