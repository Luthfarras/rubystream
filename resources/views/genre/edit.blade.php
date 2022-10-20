@extends('template')
@section('content')

<form action="{{ route('genre.update', $data->id) }}" method="POST" >
  @csrf
  @method('PUT')
  <div class="form-group">
  <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-white footer">
        <div class="modal-body">
          <label>Ready to edit</label>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <input class="form-control mt-5 @error('genre') is-invalid @enderror" placeholder="Edit Genre" name="genre" value="{{ $data->genre }}">
          <div class="mt-5">
            <button type="submit" class="btn btn-success text-white">Update</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
  </div>
</form>

@endsection