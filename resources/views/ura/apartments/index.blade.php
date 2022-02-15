@extends('layouts.ura')


@section('content')
<<<<<<< HEAD
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
=======
    <div class="container my-5">
        <div class="row justify-content-between mb-5">
            <div class="col">
                <h1 class="">My Apartments</h1>
            </div>
>>>>>>> origin/dashboard

            <div class="col-2">
                <a class="btn btn-success" href="{{ route('ura.apartments.create') }}">
                    <i class="fas fa-plus"></i> New host
                </a>
            </div>
        </div>
<<<<<<< HEAD
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
=======

        {{-- Generate cards for each apartment --}}
        @forelse ($apartments as $apartment)
            <div class="card mb-3 w-100">
                <div class="row g-0">
                    {{-- Apartment thumb --}}
                    <div class="col-md-4">
                        <a href="{{ route('ura.apartments.show', $apartment->id) }}">
                            <img src="{{ $apartment->thumbnail }}" class="img-fluid rounded-start"
                                alt="{{ $apartment->slug }}">
                        </a>
                    </div>
                    {{-- Apartment Body --}}
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('ura.apartments.show', $apartment->id) }}">{{ $apartment->title }}</a>
                            </h4>
                            <p class="card-text">{{ $apartment->address }}</p>
                            <p class="card-text">
                                <small class="text-muted">Created on {{ $apartment->created_at }}</small>
                            </p>
                            <div class="d-flex">
                                <a href="{{ route('ura.apartments.show', $apartment->id) }}" class="btn btn-light mx-1">
                                    <i class="fa fa-eye text-primary"></i>
                                </a>
                                <a href="{{ route('ura.apartments.edit', $apartment->id) }}" class="btn btn-light mx-1">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
>>>>>>> origin/dashboard
                                <form action="{{ route('ura.apartments.destroy', $apartment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light mx-1">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            {{-- If apartment records are empty.. --}}
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center">
                    No hostings yet. Why don't you...
                </h2>
                <a href="{{ route('ura.apartments.create') }}" class="btn btn-primary">Become an Host</a>
            </div>
        @endforelse

        {{-- Pagination --}}
        {{-- {{ $collection->links() }} --}}
    </div>
@endsection
