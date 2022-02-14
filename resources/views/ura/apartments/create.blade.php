@extends('layouts.ura')


@section('content')
    {{-- Container could be further resized --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="mb-5">New hosting</h1>
                {{-- Error directive --}}
                @include('partials.validation_errors')

                <form action="{{ route('ura.apartments.store') }}" method="post">
                    @csrf


                    {{-- Thumbnail input --}}
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Pictures</label>
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                            placeholder="Drag photos here or click to select" aria-describedby="thumbnail">
                        <small id="thumbnail" class="form-text text-muted">Max 1MB</small>
                    </div>

                    {{-- Title input --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title Here"
                            value="{{ old('title') }}">
                    </div>

                    {{-- Address input --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Via Roma 1"
                            value="{{ old('address') }}">
                    </div>

                    {{-- <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" id="latitude" class="form-control" placeholder="latitude Here"
                            value="{{ old('latitude') }}">
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control" placeholder="longitude Here"
                            value="{{ old('longitude') }}">
                    </div> --}}

                    {{-- Rooms input --}}
                    <div class="mb-3">
                        <label for="number_of_rooms" class="form-label">Rooms</label>
                        <select class="form-control" name="number_of_rooms" id="number_of_rooms">
                            <option>Select rooms</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}" {{ old('number_of_rooms') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ old('number_of_rooms') == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                    </div>

                    {{-- Beds input --}}
                    <div class="mb-3">
                        <label for="number_of_beds" class="form-label">Beds</label>
                        <select class="form-control" name="number_of_beds" id="number_of_beds">
                            <option>Select beds</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}" {{ old('number_of_beds') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ old('number_of_beds') == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                    </div>

                    {{-- Bathrooms input --}}
                    <div class="mb-3">
                        <label for="number_of_baths" class="form-label">Bathrooms</label>
                        <select class="form-control" name="number_of_baths" id="number_of_baths">
                            <option>Select bathrooms</option>
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}"
                                    {{ old('number_of_baths') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                            <option value="99" {{ old('number_of_baths') == 99 ? 'selected' : '' }}>10+</option>
                        </select>
                    </div>

                    {{-- Square meters input --}}
                    <div class="mb-5">
                        <label for="square_metres" class="form-label">Floor area (mq)</label>
                        <input type="text" name="square_metres" id="square_metres" class="form-control"
                            placeholder="Type floor area in square meters " value="{{ old('square_metres') }}">
                    </div>

                    {{-- Availability input --}}
                    <div class="mb-3">
                        <label class="d-block">Instantly available</label>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="is_aviable" id="is_aviable" value="1">
                                Yes
                                <input class="form-check-input" type="radio" name="is_aviable" id="is_aviable" value="0"> No
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary btn-lg my-5">Create</button>
                    </div>
            </div>
        </div>


        </form>
    </div>
    </div>
@endsection
