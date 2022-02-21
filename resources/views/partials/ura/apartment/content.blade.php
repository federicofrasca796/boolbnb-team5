<h4 class="card-title">
    <a href="{{ route('ura.apartments.show', $apartment->slug) }}">{{ $apartment->title }}</a>
</h4>
<p class="card-text">{{ $apartment->address }}</p>
<p class="card-text">
    <small class="text-muted">
        Services:
        @forelse($apartment->services as $service)
                {{ $service->name }}
            @if (!$loop->last)
                ,
            @endif

        @empty
            None
        @endforelse
    </small>
</p>
<p class="card-text">
    <small class="text-muted">Created on {{ $apartment->created_at }}</small>
</p>