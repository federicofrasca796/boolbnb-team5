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
                                <small class="text-muted">Created on {{ $apartment->created_at }}</small>
                            </p>
                            <div class="d-flex">
                                <a href="{{ route('ura.apartments.show', $apartment->slug) }}" class="btn btn-light mx-1">
                                    <i class="fa fa-eye text-primary"></i>
                                </a>
                                <a href="{{ route('ura.apartments.edit', $apartment->slug) }}"
                                    class="btn btn-light mx-1">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <button type="button" class="btn btn-light mx-1" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $apartment->slug }}">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                                <div class="modal fade" id="delete{{ $apartment->slug }}" tabindex="-1"
                                    aria-labelledby="modal-{{ $apartment->slug }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="{{ $apartment->slug }}Label">You are
                                                    trying to delete apartment: "{{ $apartment->title }}"</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to remove it?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('ura.apartments.destroy', $apartment->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger mx-1">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($apartment->is_aviable === 0 )


                                    <!-- Button trigger modal -->
                                    <button type="button" class=" btn btn-light mx-1 text-muted" data-bs-toggle="modal" data-bs-target="#serviceModal">
                                      <i class="fas fa-low-vision"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-75">You're trying to make the apartment visible: "{{ $apartment->slug }}"</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                            {{-- <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button> --}}
                                                            <button type="submit" class="btn btn-primary btn-lg">Make it visbile</button>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

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
        <div id="paginate" class="mt-5 d-flex justify-content-center">
            {{ $apartments->links() }}
        </div>
    </div>
@endsection

