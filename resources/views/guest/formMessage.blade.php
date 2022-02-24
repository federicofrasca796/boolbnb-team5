@extends('layouts.app')

@section('content')
    
<div class="container mt-5">
    <h1 class="text-center">{{ $apartment->title }}</h1>
    @include('partials.errors')
    @include('partials.success')
	<div class="m-auto w-50" id="form-sendMessage">
		<form action="{{ route('message.send') }}" method="POST">
			@csrf
			<div class="mb-3 d-flex flex-column align-items-center justify-content-center">
					<label for="body" class="form-label">Name</label>
				@if (Auth::check())
					<input required type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" value="{{ Auth::user()->name }}" readonly>
				@else
					<input required type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" value="{{ old('name') }}">
				@endif
				@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3 d-flex flex-column align-items-center justify-content-center">
					<label for="mail" class="form-label">Mail</label>
				@if (Auth::check())
					<input required type="mail" name="mail" id="mail" class="form-control @error('mail') is-invalid @enderror" placeholder="mail" value="{{ Auth::user()->email }}" readonly>
				@else
					<input required type="mail" name="mail" id="mail" class="form-control @error('mail') is-invalid @enderror" placeholder="mail" value="{{ old('mail') }}">
				@endif
				@error('mail')
					<div class="alert alert-danger">{{$message }}</div>
				@enderror
			</div>
			<div class="mb-3 d-flex flex-column align-items-center justify-content-center">
				<label for="body" class="form-label">Message</label>
				<textarea required class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" minlength="30"></textarea>
				<small>Type your message here | min:30 characters</small>
				@error('body')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div id="submit" class="d-flex justify-content-center">
				<button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection