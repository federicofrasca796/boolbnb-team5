@extends('layouts.ura')


@section('css')
<!-- TomTom Search Style -->
<link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'/>

@section('content')
    {{-- Container could be further resized --}}
    <div class="container">

        
        {{-- <h2 class="text-center">Update your apartment</h2>
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
            <div class="mb-3" id="address">
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
                @enderror --}}
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="mb-5">New hosting</h1>
                {{-- Error directive --}}
                @include('partials.validation_errors')

                <form action="{{ route('ura.apartments.update', $apartment->id) }}" method="post">
                    @csrf
                    @method('PUT')


                    {{-- Thumbnail input --}}
                    <div class="mb-3">
                        To be fixed...
                        <label for="thumbnail" class="form-label">Pictures*</label>
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                            placeholder="Drag photos here or click to select" aria-describedby="thumbnail" required>
                        <small id="thumbnail" class="form-text text-muted">Max 1MB</small>
                    </div>

                    {{-- Title input --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title Here"
                            value="{{ $apartment->title }}" required>
                    </div>

                    {{-- Address input --}}
                    <div class="mb-3" id="address">
                        <label for="address" class="form-label">Address*</label>
                    </div>

                    {{-- Square meters input --}}
                    <div class="mb-3">
                        <label for="square_metres" class="form-label">Floor area (mq)*</label>
                        <input type="text" name="square_metres" id="square_metres" class="form-control"
                            placeholder="Type floor area in square meters " value="{{ $apartment->square_metres }}"
                            required>
                    </div>

                    {{-- Rooms input --}}
                    <div class="mb-3">
                        <label for="number_of_rooms" class="form-label">Rooms*</label>
                        <select class="form-control" name="number_of_rooms" id="number_of_rooms" required>
                            <option>Select rooms</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $apartment->number_of_rooms == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ $apartment->number_of_rooms == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                    </div>

                    {{-- Beds input --}}
                    <div class="mb-3">
                        <label for="number_of_beds" class="form-label">Beds*</label>
                        <select class="form-control" name="number_of_beds" id="number_of_beds" required>
                            <option>Select beds</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $apartment->number_of_beds == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ $apartment->number_of_beds == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                    </div>

                    {{-- Bathrooms input --}}
                    <div class="mb-3">
                        <label for="number_of_baths" class="form-label">Bathrooms*</label>
                        <select class="form-control" name="number_of_baths" id="number_of_baths" required>
                            <option>Select bathrooms</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $apartment->number_of_baths == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ $apartment->number_of_baths == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                    </div>

                    {{-- Availability input --}}
                    {{-- !!!TO DO: Add select previous selection feature --}}
                    <div class="mb-3">
                        <label class="d-block">Instantly available*</label>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="is_aviable" id="is_aviable" value="1">
                                Yes
                                <input class="form-check-input" type="radio" name="is_aviable" id="is_aviable" value="0"> No
                            </label>
                        </div>
                    </div>

                    {{-- Services input --}}
                    {{-- !!!TO DO: Add select previous selection feature --}}
                    <div class="mb-1">Services*</div>
                    <div class="form-check form-check-inline mb-5">
                        {{-- There could be buttons with icons insted of checkboxes --}}
                        <input type="checkbox" class="form-check-input" name="service_id" id="service_id" value="1">
                        <label class="form-check-label mx-2" for="service_id">
                            Service 1
                        </label>

                        <input type="checkbox" class="form-check-input" name="service_id" id="service_id" value="2">
                        <label class="form-check-label mx-2" for="service_id">
                            Service 2
                        </label>

                        <input type="checkbox" class="form-check-input" name="service_id" id="service_id" value="3">
                        <label class="form-check-label mx-2" for="service_id">
                            Service 3
                        </label>

                    </div>

                    {{-- Submit form --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary btn-lg my-5">Create</button>
                    </div>

                </form>
            </div>
        </div>



            {{-- <button type="submit" class="btn btn-outline-primary btn-lg">Update</button>
            <a class="btn btn-outline-warning btn-lg" href="{{ route('ura.apartments.index') }}">Back</a>
        </form> --}}

    {{-- </div>
    </div>
 --}}
    <!-- Required TomTom SearchBox Cdn -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>

    <!-- Main Script -->
    <!-- <script src="{{asset('js/edit-apartment-search.js')}}"></script> -->

    <!-- Script for setting value to address input MUST be on blade page -->
    <script>
        var options = {
        searchOptions: {
            key: 'jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj',
            language: 'it-IT',
            limit: 5
        }
    };
    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    document.getElementById('address').append(searchBoxHTML);
    document.querySelector('.tt-search-box-input').name = 'address';
    document.querySelector('.tt-search-box-input').id = 'address';
    document.querySelector('.tt-search-box-input').placeholder = 'Search your address';



    /* Results Log */
    ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
        console.log(data.data.result.position);
        document.getElementById('latitude').value = data.data.result.position.lat;
        document.getElementById('longitude').value = data.data.result.position.lng;
    });

    var value = {!! json_encode($apartment->address) !!}
    ttSearchBox.setValue(value);
    </script>
@endsection
