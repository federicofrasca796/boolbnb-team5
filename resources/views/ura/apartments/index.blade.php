@extends('layouts.ura')


@section('content')
<div class="container">
    <div class="p-5 bg-light">
        <div class="container ml-auto">
            <h1 class="display-3 text-center">Apartments</h1>
            <hr class="my-2">
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $item)
                  <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->address }}</td>
                </tr>  
                @endforeach
                

            </tbody>
        </table>
    </div>

</div>

@endsection