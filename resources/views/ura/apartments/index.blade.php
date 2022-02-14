@extends('layouts.ura')


@section('content')
    <div class="container my-5">
        <h1 class="mb-5">My Apartments</h1>
        {{-- <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="{{ route('ura.apartments.show', $item->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('ura.apartments.edit', $item->id) }}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="{{ route('ura.apartments.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table> --}}

        @forelse ($apartments as $apartment)
            {{-- <div class="card mb-3 w-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $apartment->thumbnail }}" class="img-fluid rounded-start"
                                alt="{{ $apartment->slug }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $apartment->title }}</h4>
                                <p class="card-text">{{ $apartment->address }}</p>
                                <p class="card-text">
                                    <small class="text-muted">Created on {{ $apartment->created_at }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
        @empty
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center">
                    No hostings yet. Why don't you...
                </h2>
                <a href="{{ route('ura.apartments.create') }}" class="btn btn-primary">Become an Host</a>
            </div>
        @endforelse

    </div>
@endsection
