@extends('template')

@section('content')


<!-- <form action="{{ url('genre')}}" method="POST">
    @csrf
        <div class="modal-dialog">
            <div class="modal-content text-white footer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to input</h5>
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
</form> -->

<form action="{{ url('genre')}}" method="POST">
    @csrf
    <!-- <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-body">
                    <label>Ready to input</label>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                    <div class="form-group mt-5">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Input Genre" name="genre" value="{{old('genre')}}">
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-dark text-white">Input</button>
                        <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</form>

@endsection
