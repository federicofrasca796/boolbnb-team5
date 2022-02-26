@extends('layouts.ura')


@section('content')

<div class="ura_index_header w-100 py-4 mb-2">
    <div class="w-85 m-auto">
        <h1 class="text-white">My Apartments</h1>
    </div>
</div>
@include('partials.success')
<div class="container_ura_index w-85 m-auto my-5 d-flex flex-column">

    @if(Auth::user()->apartment()->count() > 0)
    <a class="btn btn-success text-white align-self-end mb-3" href="{{ route('ura.apartments.create') }}">
        <i class="fas fa-plus"></i> NEW APARTMENT
    </a>
    @endif

    {{-- Generate cards for each apartment --}}
    @forelse ($apartments as $apartment)
    <div class="card mb-3 w-100 flex-column flex-md-row">

        <div class="row d-flex {{ $apartment->is_aviable === 0 ? 'blur' : '' }}">
            {{-- Apartment thumb --}}
            <div class="col-md-3 position-relative">
                <a class="" href="{{'/apartments/' . $apartment->slug}}">
                    <img src="{{ asset('storage/' . $apartment->thumbnail) }}" class="img-fluid" alt="{{ $apartment->slug }}">
                </a>
                @if ($apartment->is_aviable === 0 )
                <!-- modal visibility button trigger -->
                <a type="button" class="position-absolute top-50 start-50 translate-middle px-4 py-3 text-muted" data-bs-toggle="modal" data-bs-target="#makeVisibile{{ $apartment->slug }}">
                    <i class="fa-solid fa-eye-slash text-white fs-1"></i>
                </a>
                <!-- modal visibility -->
                <div class="modal fade" id="makeVisibile{{ $apartment->slug }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $apartment->slug }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-85" id="{{ $apartment->slug }}Label">You're trying to make the apartment "{{ $apartment->title }}" visible</h5>
                                <button type="button" class="btn-close align-self-baseline" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('ura.apartments.makeVisibile', $apartment->slug) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="is_aviable">Do you want to make this apartment visible?</label>
                                        <input required class="ms-3" type="checkbox" name="is_aviable" id="is_aviable" value="1">
                                        <label for="">YES</label>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button type="submit" class="btn">MAKE IT VISIBLE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            {{-- Apartment Body --}}
            <div class="col-md-7">
                <div class="card-body d-flex flex-column h-100 justify-content-between">
                    <div class="card-content">
                        <h3>{{ $apartment->title }}</h3>
                        <h6 class="card-text">{{ $apartment->address }}</h6>
                        <br>
                        <p class="card-text text-secondary">

                            <strong>Extra services:</strong>

                            <span>
                                @forelse($apartment->services as $service)
                                {{ $service->name }}
                                @if (!$loop->last) -
                                @endif

                                @empty
                                None
                                @endforelse
                            </span>
                        </p>
                    </div>
                    <small class="text-muted">Created on {{ $apartment->created_at->toDateString() }} - Last update {{$apartment->updated_at->toDateString()}}</small>
                </div>

            </div>
        </div>
        <div class="tools end-0 d-flex justify-content-center align-items-center">

            @include('partials.ura.apartment.actions')

        </div>
    </div>
    @empty
    {{-- If apartment records are empty.. --}}
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-center">
            No apartments yet. Why don't you...
        </h2>
        <a href="{{ route('ura.apartments.create') }}" class="btn btn-success text-white">BECOME A HOST</a>
    </div>
    @endforelse

    {{-- Pagination --}}
    <div id="paginate" class="mt-5 d-flex justify-content-center">
        {{ $apartments->links() }}
    </div>
</div>
@endsection