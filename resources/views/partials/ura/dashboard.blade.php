@extends('layouts.ura')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div>Apartments</div>
                    <a href="{{ route('ura.apartments.index') }}" class="btn btn-primary">
                        Check your apartments
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div>Inbox</div>
                    <a href="{{ route('ura.messages.index') }}" class="btn btn-primary">
                        Check your inbox
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
