@extends('layouts.app')

@section('content')
<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center px-4 py-3">
                    <h5 class="mb-0">Register your account and join BoolBnB</h5>
                </div>

                <div class="card-body p-5">
                    @include('partials.errors')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus maxlength="25" minlength="3" placeholder="Type your name">
                                <!-- <small class="text-muted">Add your name min: 3 | max: 25 characters</small> -->

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                            {{-- Surname --}}
                            <div class="form-group row mb-4">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" autocomplete="surname" autofocus
                                        maxlength="25" minlength="3" placeholder="Type your surname">
                                    <!-- <small class="text-muted">Add your surname min: 3 | max: 25 characters</small> -->

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        {{-- Date of birth --}}
                        <div class="form-group row mb-4">
                            <label for="date_of_birth"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_of_birth" type="date"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" value="{{ old('date_of_birth') }}"
                                            autocomplete="date_of_birth" autofocus min="1900-01-01"
                                            max="{{ now()->subYears(18)->toDateString('d/m/Y') }}">
                                        <small class="text-muted">Choose your date of birth</small>

                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                             @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                        {{-- Email --}}
                        <div class="form-group row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Type your e-mail address">
                                <!-- <small class="text-muted">Add your email address</small> -->

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8" placeholder="*******">
                                <small class="text-muted">Password must be min 8 characters</small>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" minlength="8" placeholder="*******">
                                <small class="text-muted">Please type again your password</small>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn text-white w-100">
                                    REGISTER
                                </button>
                            </div>
                        </div>
                        <small class="text-muted fst-italic fw-bold">Fields marked with * are required</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection