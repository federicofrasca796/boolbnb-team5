<div class="search-destination">
    <form action="#">
        <div class="input-group w-100">
            <span class="input-group-text px-4" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
            <input type="text" class="form-control" placeholder="Find your destination">
            <div class="h-100 bg-white container-button-search">
                <button class="h-100 border-0 " type="submit">
                    @if (Route::currentRouteName() === 'guest.advanced-search') <i class="fa-solid fa-magnifying-glass"></i> @else SEARCH @endif</button>
            </div>

        </div>
    </form>
</div>