<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">

            <form action="{{ url('genre')}}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                    <label>Ready to edit</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-5">
                        <input type="text" id="genre" placeholder="Edit Genre" name="genre">
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success text-white">Update</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
</div>