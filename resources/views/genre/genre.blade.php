@extends('template')

@section('content')

<!-- start modal add -->
<div class="form-group container mt-3">
    <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a>
</div>

@include('genre.create')
<!-- end modal add -->

<!-- start table -->
<div class="container text-light" id="body">
<div class="ms-auto me-auto">
<table id="datatable" class="table text-white" style="width: 87rem;">
  <thead>
    <tr>
      <th scope="col" class="border border-0">#</th>
      <th scope="col" class="border border-0 text-center">Movie Genre</th>
      @if(Auth::user()->role == 'admin')
      <th scope="col" class="border border-0 text-center">Update</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $genre)
    <tr>
      <th scope="row" class="border border-0">{{ $loop->iteration }}</th>
      <td scope="row" class="border border-0 text-center">
        <a href="dashboard">{{ $genre['genre']}}</a>
    </td>
    @if(Auth::user()->role == 'admin')
      <td scope="row" class="border border-0 text-center">
    <a class="btn btn-success" href="{{route('genre.edit',$genre->id)}}">Edit</a>
    <!-- start delete -->
    <a class="btn btn-danger" href="{{ route ('deletegenre',$genre->id)}}">Delete</a>
    <!-- end delete -->

    </td>
    @endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<!-- end table -->

<!-- https://cdn.datatables.net/ -->

@endsection
