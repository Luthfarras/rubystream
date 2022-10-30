@extends('template')

@section('content')
<div class="container">
    <h2 class="text-center text-white">
        History Purchase
    </h2>
    <table id="datatable" class="table text-white" >
        <thead>
          <tr>
            <th style="border: 0; width:20%;" scope="col">#</th>
            <th style="border: 0; width:20%;" scope="col">Movie Genre</th>
            <th style="border: 0; width:20%;" scope="col">Update</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th style="border: 0;" scope="row"></th>
            <td style="border: 0;" >
              <a href="dashboard"></a>
          </td>
            <td style="border: 0;" >
          <a class="btn btn-success" href="">Edit</a>
          <!-- start delete -->
          <a class="btn btn-danger" href="">Delete</a>
          <!-- end delete -->
      
          </td>
          </tr>
        </tbody>
      </table>
</div>
@endsection
