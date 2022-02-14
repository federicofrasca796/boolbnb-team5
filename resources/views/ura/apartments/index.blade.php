@extends('layouts.ura')


@section('content')
    <div class="container">
        <div class="p-5 bg-light">
            <div class="container ml-auto">
                <div class="d-flex">
                    <h1 class="display-5 text-center">Apartments</h1>
                    <div class="btn btn-outline-primary btn-lg d-flex justify-content-center align-items-center"><a
                            href="{{ route('ura.apartments.create') }}">Create</a></div>
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
                    @foreach ($apartments as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="{{ route('ura.apartments.show', $item->id) }}"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('ura.apartments.edit', $item->id) }}"><i
                                        class="fas fa-user-edit"></i></a>
                                <form action="{{ route('ura.apartments.destroy', $item->id) }}" method="post">
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
