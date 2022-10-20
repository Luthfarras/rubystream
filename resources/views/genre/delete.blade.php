<form>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-body">
                    <label>Ready to delete</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-5">
                        Are you sure delete it?
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-danger" href="{{ route ('deletegenre',$genre->id)}}">Delete</a>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>