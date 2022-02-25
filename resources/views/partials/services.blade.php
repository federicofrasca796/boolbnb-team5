 <div class=" container-extra-service mb-5 m-auto">
        <h3 class="text-center text-md-start mt-4 mb-3">Extra services</h3>
        <div class="col-12 col-md-8 d-flex flex-wrap ">
            @foreach ($apartment->services as $service)
                @if ($service->name == 'WiFi')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' .  $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me-3 mb-3">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Kitchen')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Self check-in')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Pool')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Hot tub')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'free parking')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/'  . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Air Conditioning')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/'  . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Gym')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'EV charger')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Smoke alarm')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/'  . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Fireplace')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Dryer')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Washer')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @elseif($service->name == 'Dedicated workspace')
                    <div class="col-4 col-md-3 text-md-start mb-2">
                        <img src="{{ asset('img/services/' . $service->slug . '.png') }}" alt=""><span
                            class="ms-2 me- mb-33 ">{{ $service->name }}</span>
                    </div>
                @endif
            @endforeach

        </div>


    </div>