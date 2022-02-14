@extends('layouts.ura')


@section('content')
    @include('partials.success')
    <div class="container">
        <div class="p-5 bg-light">
            <div class="container me-auto">
                <div class="d-flex justify-content-between">
                    <h1 class="display-5 text-center">Apartments</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('ura.apartments.create') }}" class="btn btn-outline-primary btn-lg ">Create</a>
                    </div>
                </div>

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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <td scope="row">{{ $apartment->id }}</td>
                            <td>{{ $apartment->title }}</td>
                            <td>{{ $apartment->address }}</td>
                            <td>
                                <a class="btn btn-outline-primary"
                                    href="{{ route('ura.apartments.show', $apartment->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-outline-warning"
                                    href="{{ route('ura.apartments.edit', $apartment->id) }}"><i
                                        class="fas fa-user-edit"></i></a>
                                <form action="{{ route('ura.apartments.destroy', $apartment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

@endsection
