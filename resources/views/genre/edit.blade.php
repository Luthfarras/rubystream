    <div class="modal fade" id="editgenre{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">

            <form action="{{ route('genre.update', $g->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                    <label class="mb-4 float-left">Ready to edit</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-5">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Input Genre" name="genre" value="{{ old('genre', $g->genre) }}">
                    </div>
                    <div class="mt-5">
                        <!-- <button type="submit" class="btn btn-dark text-white">Input</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                        <button type="submit" class="float-right btn btn-success text-white">Update</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>