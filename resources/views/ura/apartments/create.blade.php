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
                        <label for="thumbnail" class="form-label">Pictures*</label>
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                            placeholder="Drag photos here or click to select" aria-describedby="thumbnail" required>
                        <small id="thumbnail" class="form-text text-muted">Max 1MB</small>
                    </div>

                    {{-- Title input --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title Here"
                            value="{{ old('title') }}" required>
                    </div>

                    {{-- Address input --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address*</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Via Roma 1"
                            value="{{ old('address') }}" required>
                    </div>

                    {{-- Square meters input --}}
                    <div class="mb-3">
                        <label for="square_metres" class="form-label">Floor area (mq)*</label>
                        <input type="text" name="square_metres" id="square_metres" class="form-control"
                            placeholder="Type floor area in square meters " value="{{ old('square_metres') }}" required>
                    </div>

                    {{-- Rooms input --}}
                    <div class="mb-3">
                        <label for="number_of_rooms" class="form-label">Rooms*</label>
                        <select class="form-control" name="number_of_rooms" id="number_of_rooms" required>
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
                        <label for="number_of_beds" class="form-label">Beds*</label>
                        <select class="form-control" name="number_of_beds" id="number_of_beds" required>
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
                        <label for="number_of_baths" class="form-label">Bathrooms*</label>
                        <select class="form-control" name="number_of_baths" id="number_of_baths" required>
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

                    {{-- Availability input --}}
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
            </div>
        </div>


        </form>
    </div>
    </div>
@endsection
