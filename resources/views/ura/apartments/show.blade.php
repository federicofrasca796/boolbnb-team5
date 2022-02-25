@extends('layouts.ura')

@section('content')
    @include('partials.success')
    <div class="container_img w-100 px-3 d-flex flex-wrap position-relative">
        <div id="thumbnail" class="col-12 h-100 p-2 {{ $apartment->is_aviable === 0 ? 'blur' : '' }}">
            <img src="{{ asset('storage/' . $apartment->thumbnail) }}" alt="{{ $apartment->slug }}"
                class="w-100 h-100">
            <div id="backward" class="d-flex justify-content-center position-absolute">
                <a class="d-flex justify-content-center align-items-center btn btn-outline-dark btn-lg py-3"
                    href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg fa-fw"></i></a>
            </div>
        </div>
    </div>

    {{-- /.thumbnail --}}
    @if ($apartment->is_aviable === 0)
        <div class="d-flex w-100 justify-content-center mt-3">
            <!-- Button trigger modal -->
            <button type="button" class=" btn btn-outline-success btn-lg mx-1" data-bs-toggle="modal"
                data-bs-target="#serviceModal">
                Make it visibile
            </button>

            <!-- Modal -->
            <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title w-75">You're trying to make the apartment visible:
                                "{{ $apartment->slug }}"</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('ura.apartments.makeVisibile', $apartment->slug) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="is_aviable">Do you want to make this apartment visible?</label>
                                    <input required class="ms-3" type="checkbox" name="is_aviable" id="is_aviable"
                                        value="1">
                                    <label for="">YES</label>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container_home d-flex flex-wrap m-auto py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                {{ $apartment->address }}
                <h1>{{ $apartment->title }}</h1>

                <h4>About this home</h4>
                <p>{{ $apartment->description }}</p>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="m-auto rounded-pill sticky-top">
                    @forelse ($apartment->message as $item)
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                <h5 class="card-text">{{ $item->mail }}</h5>
                                <p class="card-text mb-0 w-75 m-auto">{{ $item->body }}</p>
                            </div>
                        </div>
                    @empty
                        No messages
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container_details m-auto">
        <hr class="col-12 col-md-8">
        <h1 class="text-center text-md-start mt-4">All the details</h1>
        <div class="col-12 col-md-8 d-flex mt-4 flex-wrap">

            <div class="col-6 col-md-3 text-center text-md-start mb-5">
                <img src="{{ asset('img/plans.png') }}" alt=""><span
                    class="ms-4">{{ $apartment->square_metres }} m&sup2;</span>
            </div>
            <div class="col-6 col-md-3 text-center text-md-start">
                <img src="{{ asset('img/open-door.png') }}" alt=""><span
                    class="ms-4">{{ $apartment->number_of_rooms }} rooms</span>
            </div>
            <div class="col-6 col-md-3 text-center text-md-start">
                <img src="{{ asset('img/bed.png') }}" alt=""><span
                    class="ms-4">{{ $apartment->number_of_beds }}
                    beds</span>
            </div>
            <div class="col-6 col-md-3 text-center text-md-start">
                <img src="{{ asset('img/shower.png') }}" alt=""><span
                    class="ms-4">{{ $apartment->number_of_baths }} bath</span>
            </div>
        </div>
    </div>
    @if ($apartment->services != null)
        @include('partials.services')
    @endif
@endsection
