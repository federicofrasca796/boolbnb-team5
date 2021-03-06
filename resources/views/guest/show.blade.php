@extends ('layouts.app')
@section('css')
@section('content')
    <div class="container_img w-100 px-3 d-flex flex-wrap">
        <div class="col-12 h-100 p-2">
            <img src="{{ asset('storage/' . $apartment->thumbnail) }}" class="w-100 h-100" alt="">
        </div>

    </div>

    <div class="container_home d-flex flex-wrap m-auto py-5">
        <div class="col-12 col-md-8">
            <p>{{ $apartment->address }}</p>
            <h1>{{ $apartment->title }}</h1>

            <h4>About this home</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, optio praesentium libero quis ratione
                facilis molestias quod odit reiciendis hic sed magnam deserunt. Facere, fugit dolorem. Quidem nisi totam
                voluptates.
                Consectetur eligendi corrupti, ratione illum delectus vitae veritatis cupiditate? Recusandae beatae
                blanditiis aliquid, repellat illum impedit inventore, odio ipsa repellendus cumque amet incidunt! Fugiat,
                doloremque optio. Porro libero sit vitae.
                Quaerat deleniti laborum tempore aperiam nostrum eum cumque, fugit earum. Voluptatum cupiditate consequuntur
                inventore rem, dolor, ut cumque magnam magni atque quisquam similique esse? Voluptatum nemo consectetur
                numquam beatae praesentium.
                Nostrum iste accusamus iure assumenda laudantium quasi odit consequatur veritatis! Necessitatibus aspernatur
                molestiae error voluptatibus molestias incidunt saepe a corrupti nesciunt. Non, maxime. Nesciunt minus sed
                sunt. Error, amet cupiditate?
                Minus explicabo alias ullam distinctio illo iusto, iste voluptatibus nesciunt modi eos veritatis voluptatem
                asperiores blanditiis et optio magni excepturi dolor ex ea dolorem nostrum quisquam eum quas? Veniam,
                magnam.
                Dolore dolorem repellat quo quam possimus, tempora neque quod delectus esse alias et aspernatur
                reprehenderit ex fuga similique est ut. Velit mollitia illum minus laborum porro ex sunt atque praesentium.
            </p>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
            <div class="card w-50 m-auto rounded-pill sticky-top">
                <div class="card-body text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Contact the owner {{-- {{$apartment->user->name}} --}}
                    </button>
                </div>
            </div>
            @include('partials.success')
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Info apartment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('messages.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                aria-describedby="nameHelper" placeholder="Scrivi qui il tuo nome" required
                                                minlength="3" maxlength="80" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="mail" class="form-label">Indirizzo email</label>
                                            @if (Auth::check())
                                                <input type="mail" name="mail" id="mail"
                                                    class="form-control @error('mail') is-invalid @enderror"
                                                    aria-describedby="mailHelper" placeholder="name@example.com"
                                                    value="{{ Auth::user()->email }}" required autocomplete="mail"
                                                    autofocus>
                                            @else
                                                <input type="mail" name="mail" id="mail"
                                                    class="form-control @error('mail') is-invalid @enderror"
                                                    aria-describedby="mailHelper" placeholder="name@example.com"
                                                    value="{{ old('mail') }}" required autocomplete="mail" autofocus>
                                            @endif
                                            @error('mail')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Messaggio</label>
                                    <textarea name="body" id="body" rows="3" class="form-control" required
                                        minlength="30">{{ old('body') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label hidden for="apartment_id">Appartamento</label>
                                        <select hidden class="form-control" name="apartment_id" id="apartment_id">
                                            <option selected value="{{ $apartment->id }}">
                                                {{ $apartment->id }}
                                            </option>
                                        </select>
                                        @error('apartment_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label hidden for="user_id">Owner apartment</label>
                                        <select hidden class="form-control" name="user_id" id="user_id">
                                            <option selected value="{{ $apartment->user_id }}">
                                                {{ $apartment->user_id }}
                                            </option>
                                        </select>
                                        @error('user_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Invia</button>
                                    <a class="btn btn-warning" href="{{-- {{ route('guest.posts.index') }} --}}">Annulla</a>
                                </div>
                            </form>
                        </div>
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
    <div class=" container-extra-service mb-5 m-auto">
        <h3 class="text-center text-md-start mt-4 mb-3">Extra services</h3>
        <div class="col-12 col-md-8 d-flex flex-wrap ">
            @foreach ($apartment->services as $service)
                @if ($service->name == 'WiFi')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/wifi.png') }}" alt=""><span
                            class="ms-2 me-3 mb-3">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Kitchen')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/kitchen-utensils.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Self check-in')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/room-key.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
        </div>
        <div class=" container-extra-service mb-5 m-auto">
            <h3 class="text-center text-md-start mt-4 mb-3">Extra services</h3>
            <div class="col-12 col-md-8 d-flex flex-wrap ">
                @foreach ($apartment->services as $service)
                    @if ($service->name == 'WiFi')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/wifi.png') }}" alt=""><span
                                class="ms-2 me-3 mb-3">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Kitchen')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/kitchen-utensils.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Self check-in')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/room-key.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Pool')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/swimming-pool.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Hot tub')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/bath.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'free parking')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/free-parking.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Air Conditioning')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/air-conditioner.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Gym')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/weights.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'EV charger')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/charging-station.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Smoke alarm')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/smoke-detector.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Fireplace')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/fireplace.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Dryer')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/hair-dryer.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Washer')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/washer.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @elseif($service->name == 'Dedicated workspace')
                        <div class="col-4 col-md-3 text-md-start mb-2">
                            <img src="{{ asset('img/workspace.png') }}" alt=""><span
                                class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                        </div>
                    @endif
                @endforeach

            </div>


        </div>
        <div class="map">
            <img class="w-100" src="{{ asset('img/map.png') }}" alt="">

        </div>
    @endsection
