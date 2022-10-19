@extends('template')
@section('content')

<h1>Edit Genre</h1>
<form action="{{ route('genre.update', $data->id) }}" method="POST" >
  @csrf
  @method('PUT')
  <div class="form-group">
    <label>Nama</label>
    <input class="form-control @error('nama') is-invalid @enderror" name="genre" value="{{ $data->genre }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection