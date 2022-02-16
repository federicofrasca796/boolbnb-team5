@extends ('layouts.app')
@section ('content')
<div class="container_img w-100 px-3 d-flex flex-wrap">
    <div class="col-12 col-md-6 h-100 p-2">
        <img src="{{asset('storage/' . $apartment->thumbnail)}}" class="w-100 h-100" alt="">
    </div>
    <div class="col-12 col-md-6 h-100 p-2">
        <img src="{{asset('img/house 2.jpg')}}" class="w-100 h-100" alt="">
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
    <div class="col-12 col-md-4">
        <div class="card w-75 m-auto">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">

                <p class="card-text">Contact the owner</p>
            </div>
        </div>

    </div>

</div>
<div class="container_details m-auto">
    <h1>All the details</h1>
    <hr>
    <div>
        <i class="fa-solid fa-ruler-combined"></i>{{$apartment->square_metres}} m&sup2;
        <i class="fa-solid fa-door-open"></i>{{$apartment->number_of_rooms}}
        <i class="fa-solid fa-bed"></i>{{$apartment->number_of_beds}}
        <i class="fa-solid fa-shower"></i>{{$apartment->number_of_baths}}
    </div>
    <div>

        <i class="fa-solid fa-wifi"></i>Wifi
    </div>


</div>

@endsection