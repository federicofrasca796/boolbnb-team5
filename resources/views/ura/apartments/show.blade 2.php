@extends('layouts.ura')

@section('content')

    <h1>Singolo appartamento</h1>
    <p>{{ $apartment->title }}</p>
    <img src="{{ asset('storage/' . $apartment->thumbnail) }}" alt="{{ $apartment->title }}">

@endsection
