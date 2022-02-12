@extends('layouts.ura')


@section('content')
    <div class="container">
      @if($errors->any())
        @foreach($errors->all() as $error)
          <h1>{{$error}}</h1>
        @endforeach
      @endif
        <form action="{{ route('ura.Apartments.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Title Here">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" id="address" class="form-control" placeholder="address Here">
            </div>
            <div class="mb-3">
              <label for="thumbnail" class="form-label">Thumbnail</label>
              <input type="text" name="thumbnail" id="thumbnail" class="form-control" placeholder="Thumbnail Here">
            </div>
            <div class="mb-3">
              <label for="latitude" class="form-label">Latitude</label>
              <input type="text" name="latitude" id="latitude" class="form-control" placeholder="latitude Here">
            </div>
            <div class="mb-3">
              <label for="longitude" class="form-label">longitude</label>
              <input type="text" name="longitude" id="longitude" class="form-control" placeholder="longitude Here">
            </div>
            <div class="mb-3">
              <label for="number_of_rooms" class="form-label">number_of_rooms</label>
              <input type="text" name="number_of_rooms" id="number_of_rooms" class="form-control" placeholder="number_of_rooms Here">
            </div>
            <div class="mb-3">
              <label for="number_of_beds" class="form-label">number_of_beds</label>
              <input type="text" name="number_of_beds" id="number_of_beds" class="form-control" placeholder="number_of_beds Here">
            </div>
            <div class="mb-3">
              <label for="number_of_baths" class="form-label">number_of_baths</label>
              <input type="text" name="number_of_baths" id="number_of_baths" class="form-control" placeholder="number_of_baths Here">
            </div>
            <div class="mb-3">
              <label for="square_metres" class="form-label">square_metres</label>
              <input type="text" name="square_metres" id="square_metres" class="form-control" placeholder="square_metres Here">
            </div>
            <div class="mb-3">
              <label for="is_aviable" class="form-label">Aviable</label>
              <select name="is_aviable" id="is_aviable">
                  <option value="1" selected>Yes</option>
                  <option value="0">No</option>
              </select>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-lg">Create</button>
        </form>
    </div>
@endsection