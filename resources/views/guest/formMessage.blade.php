@extends('layouts.app')

@section('content')
    
<div class="container mt-5">
    <h1>Stai contattando l'host di questo appartamento {{ $apartment->user_id }}</h1>
    @include('partials.errors')
    @include('partials.success')
    <form action="{{ route('message.send') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="body" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="name" aria-describedby="helpId">
        </div>
        <div class="mb-3">
          <label for="mail" class="form-label">Mail</label>
          <input type="mail" name="mail" id="mail" class="form-control" placeholder="mail" aria-describedby="helpId">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <input type="text" name="body" id="body" class="form-control" placeholder="body" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
    </form>
</div>
@endsection