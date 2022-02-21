<header class="{{ Route::currentRouteName() === 'guest.show' || Route::currentRouteName() === 'guest.advanced-search' ? '' : 'position-fixed'}}
                w-100 d-flex justify-content-start py-3 px-4
                {{Route::currentRouteName() !== 'guest.advanced-search' ? 'justify-content-sm-center' : ''}}">
    <img id="logo" class="h-100" src="{{asset('img/logo.png')}}" alt="logo_BoolBnb">
    <h1 class="ms-3 {{ Route::currentRouteName() === 'guest.show' || Route::currentRouteName() === 'register' || Route::currentRouteName() === 'guest.advanced-search'? 'text-black' : 'text-white'}}
                {{Route::currentRouteName() === 'guest.advanced-search' ? 'd-none d-sm-block' : ''}}">BoolBnB</h1>

    @if(Route::currentRouteName() === 'guest.advanced-search')
    @include('partials.searchbar')
    @endif

    <ul class="navbar-nav position-absolute end-0 d-flex flex-row me-4">
        <!-- Authentication Links -->
        @guest
        <button class="nav-item-login rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#modal_aside_left_login" id="loginButton">
            <a class="nav-link text-dark" {{--href="{{ route('login') }}"--}}><i class="fa-solid fa-user"></i></a>
        </button>

        <!-- Modale login -->


        <div class="modal fade fixed-left" id="modal_aside_left_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-aside">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between px-4 py-3">
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="exampleModalLabel">Sign in to your account</h5>
                    </div>
                    <div class="modal-body p-5 mt">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Type your email address" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="*******" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn w-100 mt-4 px-3 py-2 text-white">
                                LOG IN
                            </button>


                            <div class="form-group d-flex justify-content-between align-items-center mt-2">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (Route::has('register'))
        <button class="nav-item-register rounded-pill" data-bs-toggle="modal" data-bs-target="#modal_aside_left_register">
            <a class="nav-link text-dark" href="{{route('register')}}">{{ __('Register') }}</a>
        </button>

        @endif
        @else
        <!-- dropdown login -->
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


    </ul>


</header>

@error('email')
<script>
    window.onload = () => {
        let login = document.getElementById('loginButton');
        login.click();
    }
</script>
@enderror
@error('password')
<script>
    window.onload = () => {
        let login = document.getElementById('loginButton');
        login.click();
    }
</script>
@enderror