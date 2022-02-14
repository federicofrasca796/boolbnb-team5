<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/ura.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        <main>
            <div class="ura-container">
                <div class="sidebar">
                    @include('partials.ura.header')
                </div>
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
