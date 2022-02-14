@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @endforeach
@endif
