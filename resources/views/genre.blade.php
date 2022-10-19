@extends('template')

@section('content')

<div class="form-group container">
    <a class="btn btn-dark " href="{{ url('genre/create')}}" data-toggle="modal" data-target="#inputModal">Input Genre</a>
    <a class="btn btn-dark " href="{{ url('genre/create')}}">Input Genre 2</a>
</div>

<form action="{{ url('genre')}}" method="POST">
    @csrf
    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-body">
                    <label>Ready to input</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-5">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Input Genre" name="genre" value="{{old('genre')}}">
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-dark text-white">Input</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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
    <a class="btn btn-success" href="{{ route ('genre.edit',$genre->id)}}" data-toggle="modal" data-target="#editModal">
        Edit
    </a>
    <a class="btn btn-success" href="{{ route ('genre.edit',$genre->id)}}">
        Edit 2
    </a>
        <!-- | -->
    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">
        Delete
    </a>
    </td>
    @endforeach
    </tr>
  </tbody>
</table>

<form action="{{ url('genre')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-body">
                    <label>Ready to edit</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-5">
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Edit Genre" name="genre" value="{{old('genre')}}">
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success text-white">Update</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- modal-dialog-centered -->
<!-- <form>    
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group container">
                        Are you sure delete it?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

@endsection
