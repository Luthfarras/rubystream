@extends('template')

@section('content')

<form action="{{ url('genre')}}" method="POST">
    @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-body">
                    <label>Ready to input</label>
                    <div class="form-group mt-5">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Input Genre" name="genre" value="{{old('genre')}}">
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-dark text-white">Input</button>
                    </div>
                </div>
            </div>
        </div>
</form>

@endsection
