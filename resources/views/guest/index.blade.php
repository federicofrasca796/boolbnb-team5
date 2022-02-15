@extends ('layouts.app')
@section('content')
@include('partials.jumbo')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($apartments as $apartment)
    <div class="col ">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <a class="text-decoration-none text-secondary" href="{{route('guest.show', $apartment->id)}}">
                    <h5 class="card-title">{{$apartment->title}}</h5>
                </a>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    @endforeach
</div>


<!-- Middleware Login redirector -->
<script>
    var value = {{$requireLogin}};
    if(value == 1){
        window.onload = ()=>{
        let login = document.getElementById('loginButton');
    login.click();
    console.log('we we')
    }
    }
</script>
@endsection