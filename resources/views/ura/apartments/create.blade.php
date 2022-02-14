@extends('layouts.ura')

@section('css')
<!-- TomTom Search Style -->
<link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'/>

@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h1>{{ $error }}</h1>
            @endforeach
        @endif
        <form action="{{ route('ura.apartments.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title Here"
                    value="{{ old('title') }}">
            </div>
            <div class="mb-3" id="address">
                <label for="address" class="form-label">Address</label>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="text" name="thumbnail" id="thumbnail" class="form-control" placeholder="Thumbnail Here"
                    value="{{ old('thumbnail') }}">
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" placeholder="latitude Here"
                    value="{{ old('latitude') }}">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" placeholder="longitude Here"
                    value="{{ old('longitude') }}">
            </div>
            <div class="mb-3">
                <label for="number_of_rooms" class="form-label">number_of_rooms</label>
                <input type="text" name="number_of_rooms" id="number_of_rooms" class="form-control"
                    placeholder="number_of_rooms Here" value="{{ old('number_of_rooms') }}">
            </div>
            <div class="mb-3">
                <label for="number_of_beds" class="form-label">number_of_beds</label>
                <input type="text" name="number_of_beds" id="number_of_beds" class="form-control"
                    placeholder="number_of_beds Here" value="{{ old('number_of_beds') }}">
            </div>
            <div class="mb-3">
                <label for="number_of_baths" class="form-label">number_of_baths</label>
                <input type="text" name="number_of_baths" id="number_of_baths" class="form-control"
                    placeholder="number_of_baths Here" value="{{ old('number_of_baths') }}">
            </div>
            <div class="mb-3">
                <label for="square_metres" class="form-label">square_metres</label>
                <input type="text" name="square_metres" id="square_metres" class="form-control"
                    placeholder="square_metres Here" value="{{ old('square_metres') }}">
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

    <!-- Required TomTom SearchBox Cdn -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>

    <!-- Main Script -->
    <script src="{{asset('js/crud-apartment-search.js')}}"></script>
@endsection
