@extends('template')

@section('content')

<div class="form-group container">
    <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a>
</div>

@include('genre.create')

<table class="table container text-white">
  <thead>
    <tr>
      <th style="border: 0;" scope="col">#</th>
      <th style="border: 0;" scope="col">Movie Genre</th>
      <th style="border: 0;" scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $genre)
    <tr>
      <th style="border: 0;" scope="row">{{ $loop->iteration }}</th>
      <td style="border: 0;" >
        <a href="dashboard">{{ $genre['genre']}}</a>
    </td>
      <td style="border: 0;" >
    <a class="btn btn-success" href="" data-toggle="modal" data-target="#editModal">Edit Error</a>
    <a class="btn btn-success" href="{{route('genre.edit',$genre->id)}}">Edit</a>
        <!-- | -->
    <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal">Delete</a>
    @include('genre.delete')
    </td>
    @endforeach
    </tr>
  </tbody>
</table>

<!-- modal-dialog-centered -->

@endsection
