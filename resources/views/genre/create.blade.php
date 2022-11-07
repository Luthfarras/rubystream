    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">

            <form action="{{ url('genre')}}" method="POST">
                    @csrf
                <div class="modal-body">
                    <label>Ready to input</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-5">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Input Genre" name="genre" value="{{old('genre')}}">
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="float-right btn btn-dark text-white">Input</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>