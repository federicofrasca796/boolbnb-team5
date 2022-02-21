@extends ('layouts.app')
@section('content')
    <router-view></router-view>

    <!-- Middleware Login redirector -->
    @if (isset($requireLogin))
        <script>
            var value = {{ $requireLogin }};
            if (value == 1) {
                window.onload = () => {
                    let login = document.getElementById('loginButton');
                    login.click();
                }
            }
        </script>
    @endif
@endsection
