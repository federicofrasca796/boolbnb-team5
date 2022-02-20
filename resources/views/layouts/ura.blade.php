<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BoolBnB') }}</title>

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/ura.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        <main>
            <div class="ura-container">
                @include('partials.ura.header')
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>

</html>