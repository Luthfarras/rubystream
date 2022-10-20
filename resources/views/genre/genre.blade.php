@extends('template')

@section('content')

<!-- start modal add -->
<div class="form-group container">
    <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a>
</div>

@include('genre.create')
<!-- end modal add -->

<!-- start table -->
<div class="container text-light">
<div class="ms-auto me-auto">
<table id="datatable" class="table text-white" style="width: 1500px;" >
  <thead>
    <tr>
      <th style="border: 0; width:20%;" scope="col">#</th>
      <th style="border: 0; width:20%;" scope="col">Movie Genre</th>
      <th style="border: 0; width:20%;" scope="col">Update</th>
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
    <!-- <a class="btn btn-success edit" href="#"> EDIT </a> -->
    <a class="btn btn-success" href="{{route('genre.edit',$genre->id)}}">Edit</a>
        <!-- | -->

    <!-- start delete -->
    <!-- <a class="btn btn-danger" href="{{ route ('deletegenre',$genre->id)}}" data-toggle="modal" data-target="#deleteModal">Delete</a> -->
    <a class="btn btn-danger" href="{{ route ('deletegenre',$genre->id)}}">Delete</a>
    @include('genre.delete')
    <!-- end delete -->

    </td>
    @endforeach
    </tr>
  </tbody>
</table>
</div>
</div>
<!-- end table -->

<!-- modal-dialog-centered -->

<!-- https://cdn.datatables.net/ -->

@endsection
