@extends('layouts.app')

@section('content')

<div class="container_message m-auto  d-flex ">
	<div class="col-12 col-md-6 px-2  h-100 d-flex align-items-center flex-column justify-content-center">
		<img class="w-100" src="{{asset('storage/' . $apartment->thumbnail)}}" alt="">
	</div>
	<div class="col-12 col-md-6 px-2 h-100 d-flex justify-content-center align-items-center flex-column">
		<div class="card" id="form-sendMessage">
			<div class="card-header text-center px-4 py-3">
				<h5 class="mb-0">{{ $apartment->title }}</h5>
			</div>
			<div class="card-body p-5">
				@include('partials.errors')
				@include('partials.success')
				<form action="{{ route('message.send') }}" method="POST">
					@csrf
					<div class="mb-3 d-none">
						@if (Auth::check())
						<input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
						@endif
						<input type="text" name="apartment_id" id="apartment_id" class="form-control" placeholder="" value="{{ $apartment->id }}">
					</div>
					<div class="mb-3 d-flex flex-column align-items-start justify-content-center">
						<label for="body" class="form-label">Name</label>
						@if (Auth::check())
						<input required type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type your name" value="{{ Auth::user()->name }}" readonly>
						@else
						<input required type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type your name" value="{{ old('name') }}">
						@endif
						@error('name')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-3 d-flex flex-column align-items-start justify-content-center">
						<label for="mail" class="form-label">Mail</label>
						@if (Auth::check())
						<input required type="mail" name="mail" id="mail" class="form-control @error('mail') is-invalid @enderror" placeholder="Type your mail" value="{{ Auth::user()->email }}" readonly>
						@else
						<input required type="mail" name="mail" id="mail" class="form-control @error('mail') is-invalid @enderror" placeholder="Type your mail" value="{{ old('mail') }}">
						@endif
						@error('mail')
						<div class="alert alert-danger">{{$message }}</div>
						@enderror
					</div>
					<div class="mb-3 d-flex flex-column align-items-start justify-content-center">
						<label for="body" class="form-label">Message</label>
						<textarea required class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" minlength="30"></textarea>
						<small>Type your message here | min:30 characters</small>
						@error('body')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<button type="submit" class=" mt-3 btn text-white w-100">
						SEND MESSAGE
					</button>
				</form>
			</div>

		</div>


	</div>

</div>
@endsection