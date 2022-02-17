@extends ('layouts.app')
@section ('content')
<div class="container_img w-100 px-3 d-flex flex-wrap">
    <div class="col-12 h-100 p-2">
        <img src="{{asset('storage/' . $apartment->thumbnail)}}" class="w-100 h-100" alt="">
    </div>

</div>

<div class="container_home d-flex flex-wrap m-auto py-5">
    <div class="col-12 col-md-8">
        <p>{{$apartment->address}}</p>
        <h1>{{$apartment->title}}</h1>

        <h4>About this home</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, optio praesentium libero quis ratione facilis molestias quod odit reiciendis hic sed magnam deserunt. Facere, fugit dolorem. Quidem nisi totam voluptates.
            Consectetur eligendi corrupti, ratione illum delectus vitae veritatis cupiditate? Recusandae beatae blanditiis aliquid, repellat illum impedit inventore, odio ipsa repellendus cumque amet incidunt! Fugiat, doloremque optio. Porro libero sit vitae.
            Quaerat deleniti laborum tempore aperiam nostrum eum cumque, fugit earum. Voluptatum cupiditate consequuntur inventore rem, dolor, ut cumque magnam magni atque quisquam similique esse? Voluptatum nemo consectetur numquam beatae praesentium.
            Nostrum iste accusamus iure assumenda laudantium quasi odit consequatur veritatis! Necessitatibus aspernatur molestiae error voluptatibus molestias incidunt saepe a corrupti nesciunt. Non, maxime. Nesciunt minus sed sunt. Error, amet cupiditate?
            Minus explicabo alias ullam distinctio illo iusto, iste voluptatibus nesciunt modi eos veritatis voluptatem asperiores blanditiis et optio magni excepturi dolor ex ea dolorem nostrum quisquam eum quas? Veniam, magnam.
            Dolore dolorem repellat quo quam possimus, tempora neque quod delectus esse alias et aspernatur reprehenderit ex fuga similique est ut. Velit mollitia illum minus laborum porro ex sunt atque praesentium.</p>
    </div>
    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
        <div class="card w-50 m-auto rounded-pill sticky-top">
            <div class="card-body text-center">
                <p class="card-text">Contact the owner</p>
            </div>
        </div>

    </div>

</div>
<div class="container_details m-auto">
    <hr class="col-12 col-md-8">
    <h1 class="text-center text-md-start mt-4">All the details</h1>
    <div class="col-12 col-md-8 d-flex mt-4 flex-wrap">

        <div class="col-6 col-md-3 text-center text-md-start mb-5">
            <img src="{{asset('img/plans.png')}}" alt=""><span class="ms-4">{{$apartment->square_metres}} m&sup2;</span>
        </div>
        <div class="col-6 col-md-3 text-center text-md-start">
            <img src="{{asset('img/open-door.png')}}" alt=""><span class="ms-4">{{$apartment->number_of_rooms}} rooms</span>
        </div>
        <div class="col-6 col-md-3 text-center text-md-start">
            <img src="{{asset('img/bed.png')}}" alt=""><span class="ms-4">{{$apartment->number_of_beds}} beds</span>
        </div>
        <div class="col-6 col-md-3 text-center text-md-start">
            <img src="{{asset('img/shower.png')}}" alt=""><span class="ms-4">{{$apartment->number_of_baths}} bath</span>
        </div>

    </div>
    <div class=" col-12 col-md-8 container-extra-service mb-5">
        <h3 class="text-center text-md-start mt-4">Extra services</h3>
        <div>
            @foreach ($apartment->services as $service)
            @if($service->name=='WiFi')
            <img src="{{asset('img/wifi.png')}}" alt=""><span class="ms-2 me-5">{{$service->name}}</span>
            @elseif($service->name=='Kitchen')
            <img src="{{asset('img/kitchen-utensils.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Self check-in')
            <img src="{{asset('img/room-key.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Pool')
            <img src="{{asset('img/swimming-pool.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Hot tub')
            <img src="{{asset('img/bath.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='free parking')
            <img src="{{asset('img/free-parking.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Air Conditioning')
            <img src="{{asset('img/air-conditioner.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Gym')
            <img src="{{asset('img/wights.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='EV charger')
            <img src="{{asset('img/charging-station.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Smoke alarm')
            <img src="{{asset('img/smoke-detector.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Fireplace')
            <img src="{{asset('img/firplace.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Dryer')
            <img src="{{asset('img/hair-dryer.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Washer')
            <img src="{{asset('img/washer.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @elseif($service->name=='Dedicated workspace')
            <img src="{{asset('img/wrokspace.png')}}" alt=""><span class="ms-2">{{$service->name}}</span>
            @endif
            @endforeach

        </div>


    </div>
</div>
<div class="map">
    <img class="w-100" src="{{asset('img/map.png')}}" alt="">

</div>

@endsection