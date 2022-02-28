@extends('layouts.ura')

@section('css')

@section('content')
    <div class="container-dashboard w-100">
        {{-- Logged message --}}
        <div id="logged-message" class="row mb-5 text-white gx-0">
            <div class="col-md-8 m-auto col-12 px-5 px-md-0">
                <h1>{{ __('Dashboard') }}</h1>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h5>{{ __('You are logged in! Now you can manage your apartments') }}</h5>


            </div>
        </div>

        {{-- Models Cards --}}
        <div id="ura-cards" class="row m-auto">
            <div class="col-12 col-md-4 mb-3">
                <div class="card p-3 h-100">
                    <div class="card-title px-3">
                        <h5 class="mb-0">Apartments</h5>
                        <br>
                        <span>You currently have {{ Auth::user()->apartment()->count() }} @if (Auth::user()->apartment()->count() == 1)
                                apartment
                            @else
                                apartments
                            @endif </span>

                    </div>
                    <div class="card-body d-flex align-items-end">
                        <a href="{{ route('ura.apartments.index') }}" class="btn btn-apartment">
                            Check your apartments
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card p-3 h-100">
                    <div class="card-title px-3">
                        <h5 class="mb-0">Inbox</h5>
                        <br>
                        <span> You currently have {{ $messages->count() }} @if ($messages->count() == 1)
                                message
                            @else
                                messages
                            @endif
                        </span>
                    </div>
                    <div class="card-body d-flex align-items-end">
                        <a href="{{ route('ura.messages.index') }}" class="btn btn-inbox">
                            Check your inbox
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card p-3 h-100">
                    <div class="card-title px-3">
                        <h5 class="mb-0">Sponsorships</h5>
                        <br>
                        <span>Your currently have {{ $apartment_sponsored->count() }} @if ($apartment_sponsored->count() == 1)
                                sponsorship
                            @else
                                sponsorships
                            @endif
                        </span>
                    </div>
                    <div class="card-body d-flex align-items-end">
                        <a href="{{ route('ura.sponsors.index') }}" class="btn btn-sponsor">
                            Check your sponsorships
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
