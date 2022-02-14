@extends('layouts.ura')

@section('css')

@section('content')
    <div class="container">

        {{-- Logged message --}}
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Models Cards --}}
        <div class="row mb-5">
            <div class="col-6">
                <div class="card p-3">
                    <div class="card-title">Apartments</div>
                    <div class="card-body">
                        <a href="{{ route('ura.apartments.index') }}" class="btn btn-primary">
                            Check your apartments
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card p-3">
                    <div class="card-title">Inbox</div>
                    <div class="card-body">
                        <a href="{{ route('ura.messages.index') }}" class="btn btn-primary">
                            Check your inbox
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
