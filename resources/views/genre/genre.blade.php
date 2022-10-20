@extends('template')

@section('content')

<!-- <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css') }}"> -->

<!-- start modal add -->
<div class="form-group container">
    <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a>
</div>

@include('genre.create')
<!-- end modal add -->

<!-- start table -->
<div class="container text-primary">
<table id="datatable" class="table text-white">
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
    <a class="btn btn-success edit" href="">Edit Error</a>
    <a class="btn btn-success" href="{{route('genre.edit',$genre->id)}}">Edit</a>
    @include('genre.edit')
        <!-- | -->
    <a class="btn btn-danger" href="{{ route ('deletegenre',$genre->id)}}" data-toggle="modal" data-target="#deleteModal">Delete</a>
    <a class="btn btn-danger" href="{{ route ('deletegenre',$genre->id)}}">Delete 2</a>
    @include('genre.delete')
    </td>
    @endforeach
    </tr>
  </tbody>
</table>
</div>
<!-- end table -->

<!-- modal-dialog-centered -->

<!-- Start Modal Delete -->

<!-- End Modal Delete -->

<!-- <script src="{{ asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js') }}"></script> -->
<!-- https://cdn.datatables.net/ -->

@endsection
