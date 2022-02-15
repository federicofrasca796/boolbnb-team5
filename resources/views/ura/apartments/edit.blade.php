@extends('layouts.ura')


@section('content')
    <div class="container">
        <h2 class="text-center">Update your apartment</h2>
        @include('partials.errors')
        <form action="{{ route('ura.apartments.update', $apartment->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Type here the title" value="{{ $apartment->title }}" maxlength="150" required>
                <small id="titleHelper" class="text-muted">Change your apartment title, max 150 characters</small>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                    placeholder="Address Here" value="{{ $apartment->address }}" required>
                <small id="addressHelper" class="text-muted">Search your apartment address</small>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    class="form-control @error('thumbnail') is-invalid
                @enderror"
                    placeholder="Add here the image" accept="jpeg,jpg,png,gif,bmp,svg,webp" required>
                <small id="thumbnailHelper" class="text-muted">Add your apartment image, max 1024kB. Accept
                    jpeg,jpg,png,gif,bmp,svg,webp</small>
                @error('thumbnail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude"
                    class="form-control @error('latitude') is-invalid
                    @enderror"
                    value="{{ $apartment->latitude }}" required>
                @error('latitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" id="longitude"
                    class="form-control @error('longitude') is-invalid
                    @enderror"
                    value="{{ $apartment->longitude }}" required>
                @error('longitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="number_of_rooms" class="form-label">Number of rooms</label>
                <input type="number" name="number_of_rooms" id="number_of_rooms"
                    class="form-control
                    @error('number_of_rooms') is-invalid @enderror"
                    placeholder="Type here the number of rooms" value="{{ $apartment->number_of_rooms }}" required
                    min="1" max="120">
                <small id="number_of_roomsHelper" class="text-muted">Update the number of rooms, min: 1 | max:
                    120</small>
                @error('number_of_rooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="number_of_beds" class="form-label">Number of beds</label>
                <input type="number" name="number_of_beds" id="number_of_beds"
                    class="form-control @error('number_of_beds')
                    is-invalid @enderror"
                    placeholder="Type here the number of beds" value="{{ $apartment->number_of_beds }}" required min="1"
                    max="120">
                <small id="number_of_bedsHelper" class="text-muted">Update the number of beds, min: 1 | max: 120</small>
                @error('number_of_beds')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="number_of_baths" class="form-label">Number of baths</label>
                <input type="number" name="number_of_baths" id="number_of_baths"
                    class="form-control
                    @error('number_of_baths') is-invalid @enderror"
                    placeholder="Type here the number of baths" value="{{ $apartment->number_of_baths }}" required
                    min="1" max="120">
                <small id="number_of_bathsHelper" class="text-muted">Update the number of baths, min: 1 | max:
                    120</small>
                @error('number_of_baths')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="square_metres" class="form-label">Number of square metres</label>
                <input type="number" name="square_metres" id="square_metres"
                    class="form-control @error('square_metres')
                    is-invalid @enderror"
                    placeholder="Type here the number of square metres" value="{{ $apartment->square_metres }}" required>
                <small id="square_metresHelper" class="text-muted">Update the number of square metres, min:
                    1 | max: 65535</small>
                @error('square_metres')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_aviable" class="form-label">Available</label>
                <select name="is_aviable" id="is_aviable" required>
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
                <div class="display-block">
                    <small id="is_aviableHelper" class="text-muted">Choose Yes or No if your apartment is available
                    </small>
                </div>
                @error('is_aviable')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-primary btn-lg">Update</button>
            <a class="btn btn-outline-warning btn-lg" href="{{ route('ura.apartments.index') }}">Back</a>
        </form>
    </div>
@endsection
