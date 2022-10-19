@extends('template')

@section('content')


<form action="{{ url('genre')}}" method="POST">
    @csrf
        <div class="modal-dialog">
            <div class="modal-content text-white footer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to input</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group container">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Input Genre" name="genre">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-white">Input</button>
                </div>
            </div>
        </div>
</form>

@endsection
