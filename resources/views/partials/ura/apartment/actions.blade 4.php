<div class="d-flex">
                                <a href="{{ route('ura.apartments.edit', $apartment->slug) }}"
                                    class="btn btn-light mx-1">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <button type="button" class="btn btn-light mx-1" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $apartment->slug }}">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                                <div class="modal fade" id="delete{{ $apartment->slug }}" tabindex="-1"
                                    aria-labelledby="modal-{{ $apartment->slug }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="{{ $apartment->slug }}Label">You are
                                                    trying to delete apartment: "{{ $apartment->title }}"</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to remove it?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('ura.apartments.destroy', $apartment->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger mx-1">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($apartment->is_aviable === 0 )


                                    <!-- Button trigger modal -->
                                    <button type="button" class=" btn btn-light mx-1 text-muted" data-bs-toggle="modal" data-bs-target="#serviceModal">
                                      <i class="fas fa-low-vision"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-75">You're trying to make the apartment visible: "{{ $apartment->slug }}"</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                    <form action="{{ route('ura.apartments.makeVisibile', $apartment->slug) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="form-group">
                                                              <label for="is_aviable">Do you want to make this apartment visible?</label>
                                                              <input required class="ms-3" type="checkbox" name="is_aviable" id="is_aviable" value="1">
                                                              <label for="">YES</label>
                                                            </div>
                                                         <div class="d-flex justify-content-center mt-2"> 
                                                            {{-- <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button> --}}
                                                            <button type="submit" class="btn btn-primary btn-lg">Make it visbile</button>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>