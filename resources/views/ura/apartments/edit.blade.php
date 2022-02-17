@extends('layouts.ura')


@section('css')
    <!-- TomTom Search Style -->
    <link rel='stylesheet' type='text/css'
        href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css' />

@section('content')
    {{-- Container could be further resized --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="mb-5">Update apartment</h1>

                {{-- Error directive --}}
                @include('partials.errors')

                <form action="{{ route('ura.apartments.update', $apartment->slug) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row align-items-center">
                        <div class="col-2 pe-0">
                            <img width="100%" src="{{ asset('storage/' . $apartment->thumbnail) }}"
                                alt="{{ $apartment->title }}">
                        </div>
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail*</label>
                                <input type="file" name="thumbnail" id="thumbnail"
                                    class="form-control @error('thumbnail') is-invalid @enderror"
                                    placeholder="Add image here" accept="jpeg,jpg,png,gif,bmp,svg,webp">
                                <small id="thumbnailHelper" class="text-muted">Update your apartment image, max 1024kB.
                                    Accept
                                    jpeg,jpg,png,gif,bmp,svg,webp</small>
                                @error('thumbnail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Title input --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input required type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Type title here"
                            value="{{ $apartment->title }}" maxlength="150">
                        <small id="titleHelper" class="text-muted">Add your title, max 150 characters</small>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Address input --}}
                    <div class="mb-3 row">
                        <div class=" col-6" id="address">
                            <label for="address" class="form-label">Address*</label>
                            {{-- This input is just for reference --}}
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Latitude --}}
                        <div class=" col-3">
                            <label for="latitude" class="form-label text-muted">Latitude</label>
                            <input type="text" name="latitude" id="latitude"
                                class="form-control @error('latitude') is-invalid @enderror"
                                value="{{ $apartment->latitude }}" required readonly>
                            @error('latitude')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Longitude --}}
                        <div class=" col-3">
                            <label for="longitude" class="form-label text-muted">Longitude</label>
                            <input type="text" name="longitude" id="longitude"
                                class="form-control @error('longitude') is-invalid @enderror"
                                value="{{ $apartment->longitude }}" required readonly>
                            @error('longitude')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Square meters input --}}
                    <div class="mb-3">
                        <label for="square_metres" class="form-label">Floor area (mq)*</label>
                        <input type="number" name="square_metres" id="square_metres"
                            class="form-control @error('square_metres') is-invalid @enderror"
                            placeholder="Type floor area in square meters" value="{{ $apartment->square_metres }}"
                            required min="1" max="65535">
                        <small id="square_metresHelper" class="text-muted">Add the number of square metres.</small>
                        @error('square_metres')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Rooms input --}}
                    <div class="mb-3">
                        <label for="number_of_rooms" class="form-label">Rooms*</label>
                        <select class="form-control @error('number_of_rooms') is-invalid @enderror" name="number_of_rooms"
                            id="number_of_rooms" required>
                            <option value="">Select rooms</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $apartment->number_of_rooms == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ $apartment->number_of_rooms == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                        @error('number_of_rooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Beds input --}}
                    <div class="mb-3">
                        <label for="number_of_beds" class="form-label">Bedrooms*</label>
                        <select class="form-control @error('number_of_beds') is-invalid @enderror" name="number_of_beds"
                            id="number_of_beds" required>
                            <option value="">Select beds</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $apartment->number_of_beds == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ $apartment->number_of_beds == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                        @error('number_of_beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Bathrooms input --}}
                    <div class="mb-3">
                        <label for="number_of_baths" class="form-label">Bathrooms*</label>
                        <select class="form-control @error('number_of_baths') is-invalid @enderror" name="number_of_baths"
                            id="number_of_baths" required>
                            <option value="">Select bathrooms</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $apartment->number_of_baths == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ $apartment->number_of_baths == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                        @error('number_of_baths')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Availability input --}}
                    <div class="mb-3">
                        <label class="d-block">Instantly available*</label>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="is_aviable_yes">
                                <input class="form-check-input" type="radio" name="is_aviable" id="is_aviable_yes" value="1"
                                    required checked>
                                Yes
                            </label>
                            <label class="form-check-label ps-4" for="is_aviable_no">
                                <input class="form-check-input" type="radio" name="is_aviable" id="is_aviable_no" value="0"
                                    required>
                                No
                            </label>
                        </div>
                        @error('is_aviable')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- Services input --}}
                    {{-- There could be buttons with icons insted of checkboxes
                    <div class="mb-5">
                        <label class="d-block">Services*</label>
                        @foreach ($services as $service)
                            <label class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="service_id[]"
                                    id="service_id_{{ $service->id }}" value="{{ $service->id }}"
                                    @if (is_array($apartment->service_id) && in_array($service->id, $apartment->service_id)) checked @endif>
                                {{ $service->name }}
                            </label>
                        @endforeach
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Services*</label>
                        <select multiple class="form-select" name="services[]" id="services" required>
                            <option disabled>Select all services</option>
                            @foreach ($services as $item)
                                <option value="{{ $item->id }}"
                                    {{ $apartment->services->contains($item) ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Submit form --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary btn-lg my-5">Update</button>
                        <a class="btn btn-outline-secondary btn-lg my-5 ms-2"
                            href="{{ route('ura.apartments.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Required TomTom SearchBox Cdn -->
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
        </script>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
        </script>

        <!-- Main Script -->
        <!-- <script src="{{ asset('js/edit-apartment-search.js') }}"></script> -->

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
