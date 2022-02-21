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
                <div class="row g-0 {{ $apartment->is_aviable === 0 ? 'blur' : '' }}">
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
                            <div class="card-content">
                                @include('partials.ura.apartment.content')
                            </div>
                            
                        </div>
                        @include('partials.ura.apartment.actions')
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
        <div id="paginate" class="mt-5 d-flex justify-content-center">
            {{ $apartments->links() }}
        </div>
    </div>
@endsection

