@extends('template')

@section('content')

<div class="form-group container">
    <a class="btn btn-dark " href="#" data-toggle="modal" data-target="#inputModal">
        Input Genre
    </a>
</div>

<form>
    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to input</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group container">
                        <input type="text" class="form-control" id="genre" placeholder="Input Genre">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-white">Input</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
    <tr>
      <th style="border: 0;" scope="row">1</th>
      <td style="border: 0;" >
        <a href="dashboard">Belum</a>
    </td>
      <td style="border: 0;" >
    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#editModal">
        Edit
    </a>
        <!-- | -->
    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">
        Delete
    </a>
    </td>
    </tr>
  </tbody>
</table>

<form>    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-white footer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to edit</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group container">
                        <input type="text" class="form-control" id="genre" placeholder="Edit Genre">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success text-white">Update</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form>    
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <!-- modal-dialog-centered -->
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
</form>

@endsection
