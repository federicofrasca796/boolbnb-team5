<a href="{{ route('ura.apartments.edit', $apartment->slug) }}" class="btn btn-light my-3 mx-5 px-4 py-3">
    <i class="fs-4 fa-solid fa-pencil text-secondary "></i>
</a>
<button type="button" class="btn btn-light my-3 mx-5 px-4 py-3" data-bs-toggle="modal" data-bs-target="#delete{{ $apartment->slug }}">
    <i class=" fs-4 fas fa-trash-alt text-danger"></i>
</button>
<div class="modal fade" id="delete{{ $apartment->slug }}" tabindex="-1" aria-labelledby="modal-{{ $apartment->slug }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $apartment->slug }}Label">You are
                    trying to delete apartment: "{{ $apartment->title }}"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove it?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">CLOSE</button>
                <form action="{{ route('ura.apartments.destroy', $apartment->slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn mx-1">
                        DELETE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Button trigger modal -->


<!-- Modal -->