<div class="modal fade" tabindex="-1" role="dialog" id="deletefilm{{ $dt->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-white footer p-0">
            <div class="modal-header">
                <h5 class="modal-title">Delete Film</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure delete film {{ $dt->nama_film }}?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('film.destroy', $dt->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
