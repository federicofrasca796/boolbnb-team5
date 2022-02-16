<header class="{{ Route::currentRouteName() === 'guest.show' ? '' : 'position-fixed'}}  w-100 d-flex justify-content-start justify-content-sm-center py-3 px-4">
    <img class="h-100" src="{{asset('img/logo.png')}}" alt="logo_BoolBnb">
    <h1 class="text-white ms-3">BoolBnB</h1>
    <ul class="navbar-nav position-absolute end-0 d-flex flex-row me-4">
        <!-- Authentication Links -->
        @guest
        <button class="nav-item-login rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#modal_aside_left_login">
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

                            <button type="submit" class="btn btn-primary w-100 mt-4 px-3 py-2">
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
            <a class="nav-link text-dark">{{ __('Register') }}</a>
        </button>

        <!-- modal register -->
        <div class="modal fade fixed-left" id="modal_aside_left_register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-aside">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between px-4 py-3">
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="exampleModalLabel">Join BoolBnb</h5>
                    </div>
                    <div class="modal-body p-5 mt">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- form name -->
                            <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Type your name" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- form surname -->
                            <div class="form-group">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="Type your surname" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- form date_of_birth -->
                            <div class="form-group">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                                <div>
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="select your date of birth" required autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- form email -->
                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Type your email address" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- form password -->
                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- form confirm_password -->
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary w-100 mt-4 px-3 py-2">
                                {{ __('Register') }}
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>


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