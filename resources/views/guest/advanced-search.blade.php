@extends('layouts.app')
@section('content')
<div class="advanced-search py-3 px-4">
    @foreach($services as $service)
    <input type="button" class="rounded-pill" value="{{$service->name}}"></input>
    @endforeach
    <input type="button" class="rounded-pill" value="More filters">

    </input>
</div>


@endsection