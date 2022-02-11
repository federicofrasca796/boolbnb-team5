@extends('layouts.ura')

@section('content')

    {{-- sidebar --}}
    <aside class="float-start">
        <div class="admin_control text-center p-2 text-white"><strong>ADMIN CONTROL</strong> </div>
        <div class="container_admin text-white mt-3">
            <i class="fas fa-user-shield"></i> Admin
        </div>
        <ul>
            <li class=""><i class="fas fa-home me-2"></i><a href="#">Homepage</a></li>
            <li class=""><a href="#"><i class="fas fa-newspaper me-2"></i>Apartments</a></li>
            <li class=""><a href="#"><i class="far fa-sticky-note me-2"></i>Messages</a></li>

            @auth

                <div class="logout text-white" aria-labelledby="navbarDropdown">
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endauth
        </ul>
    </aside>


@endsection
