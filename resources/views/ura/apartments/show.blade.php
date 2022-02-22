@extends('layouts.ura')

@section('content')

<div class="container_img w-100 px-3 d-flex flex-wrap">
    <div class="col-12 h-100 p-2 {{ $apartment->is_aviable === 0 ? 'blur' : '' }}">
        <img src="{{ asset('storage/' . $apartment->thumbnail) }}" alt="{{ $apartment->slug }}" class="w-100 h-100">
    </div>
    {{-- /.thumbnail --}}

    <div class="container_home d-flex flex-wrap m-auto py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                {{ $apartment->address }}
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
                <img src="{{ asset('img/bed.png') }}" alt=""><span class="ms-4">{{ $apartment->number_of_beds }}
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
</div>

@endsection
