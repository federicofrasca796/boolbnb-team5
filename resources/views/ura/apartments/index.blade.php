@extends('layouts.ura')


@section('content')
    @include('partials.success')

    <div class="container my-5">
        <div class="row justify-content-between mb-5">
            <div class="col">
                <h1 class="">My Apartments</h1>
            </div>

            <div class="col-2">
                <a class="btn btn-success" href="{{ route('ura.apartments.create') }}">
                    <i class="fas fa-plus"></i> New host
                </a>
            </div>
        </div>

        {{-- Generate cards for each apartment --}}
        @forelse ($apartments as $apartment)
            <div class="card mb-3 w-100">
                <div class="row g-0">
                    {{-- Apartment thumb --}}
                    <div class="col-md-4">
                        <a href="{{ route('ura.apartments.show', $apartment->slug) }}">
                            <img src="{{ asset('storage/' . $apartment->thumbnail) }}" class="img-fluid rounded-start"
                                alt="{{ $apartment->slug }}">
                        </a>
                    </div>
                    {{-- Apartment Body --}}
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">
                                <a
                                    href="{{ route('ura.apartments.show', $apartment->slug) }}">{{ $apartment->title }}</a>
                            </h4>
                            <p class="card-text">{{ $apartment->address }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Services:
                                    @forelse($apartment->services as $service)
                                        {{ $service->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif

                                    @empty
                                        None
                                    @endforelse
                                </small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Created on
                                    {{ $apartment->created_at }}</small>
                            </p>
                            <div class="d-flex">
                                <a href="{{ route('ura.apartments.show', $apartment->slug) }}" class="btn btn-light mx-1">
                                    <i class="fa fa-eye text-primary"></i>
                                </a>
                                <a href="{{ route('ura.apartments.edit', $apartment->slug) }}"
                                    class="btn btn-light mx-1">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>

                                <form action="{{ route('ura.apartments.destroy', $apartment->slug) }}" method="post">
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
