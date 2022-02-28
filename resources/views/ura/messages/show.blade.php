@extends('layouts.ura')

@section('content')

<div class="container_message m-auto d-flex">
	<div class="col-12 col-md-6 px-2 h-100 d-md-flex align-items-center flex-column justify-content-center d-none">
		<img class="w-100" src="{{asset('storage/' . $message->apartment->thumbnail)}}" alt="">
	</div>
	<div class="col-12 col-md-6 px-2 h-100 d-flex justify-content-center align-items-center flex-column">
		<div class="card h-auto card-message" id="form-sendMessage">
			<div class="card-header text-center px-4 py-3">
				<h5 class="mb-0">You've been contacted for {{ $message->apartment->title }}!</h5>
			</div>
			<div class="card-body p-4 p-md-5">
                <p>From: {{$message->name}} «{{$message->mail}}»</p>
                <p>To: me</p>
                <p>Date: {{$message->created_at}}</p>

                <div class=" p-4">
                    <p>{{$message->body}}</p>
                </div>
                
				
			</div>

		</div>


	</div>

</div>
@endsection