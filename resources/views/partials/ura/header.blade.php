<header id="ura_header" class="py-3 px-4">
    {{-- Navbar registered user w/ apartment --}}
    <nav class="navbar navbar-expand-lg navbar-light h-100 p-0">

        <a class="navbar-brand h-100 p-0" href="{{ url('/') }}"><img class="h-100" src="{{ asset('img/logo.png') }}" alt="logo_BoolBnb"></a>

        {{-- hamburger menu btn (responsive) --}}

        {{-- Nav links --}}
        <div class="{{ Route::currentRouteName() === 'ura.dashboard'  ? 'd-none' :''}}">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0 d-flex flex-row">
                <li class="nav-item me-3">
                    <a class="nav-link" href="{{ route('ura.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="{{ route('ura.apartments.index') }}">Apartments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ura.messages.index') }}">Messages</a>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Sponsor plans</a>
                    </li> --}}

            </ul>
            {{-- <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> --}}
        </div>

        {{-- User tab --}}
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('ura.dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest

    </nav>
</header>