@extends('layouts.ura')

<!-- TomTom Search Style -->
<link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'/>

@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h1>{{ $error }}</h1>
            @endforeach
        @endif
        {{-- {{ ddd($apartment) }} --}}
        <form action="{{ route('ura.apartments.update', $apartment->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title Here"
                    value="{{ $apartment->title }}">
            </div>
            <div class="mb-3" id="address">
                <label for="address" class="form-label">Address</label>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="text" name="thumbnail" id="thumbnail" class="form-control" placeholder="Thumbnail Here"
                    value="{{ $apartment->thumbnail }}">
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" placeholder="latitude Here"
                    value="{{ $apartment->latitude }}">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" placeholder="longitude Here"
                    value="{{ $apartment->longitude }}">
            </div>
            <div class="mb-3">
                <label for="number_of_rooms" class="form-label">number_of_rooms</label>
                <input type="text" name="number_of_rooms" id="number_of_rooms" class="form-control"
                    placeholder="number_of_rooms Here" value="{{ $apartment->number_of_rooms }}">
            </div>
            <div class="mb-3">
                <label for="number_of_beds" class="form-label">number_of_beds</label>
                <input type="text" name="number_of_beds" id="number_of_beds" class="form-control"
                    placeholder="number_of_beds Here" value="{{ $apartment->number_of_beds }}">
            </div>
            <div class="mb-3">
                <label for="number_of_baths" class="form-label">number_of_baths</label>
                <input type="text" name="number_of_baths" id="number_of_baths" class="form-control"
                    placeholder="number_of_baths Here" value="{{ $apartment->number_of_baths }}">
            </div>
            <div class="mb-3">
                <label for="square_metres" class="form-label">square_metres</label>
                <input type="text" name="square_metres" id="square_metres" class="form-control"
                    placeholder="square_metres Here" value="{{ $apartment->square_metres }}">
            </div>
            <div class="mb-3">
                <label for="is_aviable" class="form-label">Aviable</label>
                <select name="is_aviable" id="is_aviable">
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-lg">Update</button>
        </form>
    </div>

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
