@extends('layouts.ura')
@section('content')
<div class="singolo">
    <h1>{{$message->name}}</h1>
    <h5>{{$message->mail}}</h5>
    <p>{{$message->body}}</p>
</div>


@endsection