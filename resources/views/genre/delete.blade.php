<div class="modal fade" tabindex="-1" role="dialog" id="deletegenre{{ $genre->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-white footer">

            <form action="{{ route('genre.destroy', $genre->id) }}" method="POST">
                <div class="modal-body">
                <label class="float-left">Ready to delete</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="mt-5">Are you sure delete genre {{ $genre->genre }}?</p>
                    <div class="mt-5">
                        @csrf
                        @method('delete')
                        <button type="submit" class="float-right btn btn-danger text-white">Delete</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>