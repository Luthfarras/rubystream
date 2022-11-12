@extends('template')

@section('content')
    <!-- start modal add -->
    <div class="form-group container mt-5">
        @if (Auth::user()->role == 'admin')
        <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a>
        @endif
    </div>
    @include('genre.create')
    <!-- end modal add -->

    <!-- start table -->
    <div class="container text-light" id="body" style="height:70vh">
        <div class="ms-auto me-auto">
            <table id="datatable" class="table text-white" style="width: 87rem;">
                <thead>
                    <tr>
                        <th scope="col" class="border border-0">#</th>
                        <th scope="col" class="border border-0 text-center">Movie Genre</th>
                        @if (Auth::user()->role == 'admin')
                            <th scope="col" class="border border-0 text-center">Update</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genre as $g)
                        <tr>
                            <th scope="row" class="border border-0">{{ $loop->iteration }}</th>
                            <td scope="row" class="border border-0 text-center">
                                <a href="{{ url('category/' . $g->id) }}">{{ $g['genre'] }}</a>
                            </td>
                            @if (Auth::user()->role == 'admin')
                                <td scope="row" class="border border-0 text-center">
                                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#editgenre{{ $g->id }}">Edit</a>
                                    @include('genre.edit')
                                    <a class="btn btn-danger" href="" data-toggle="modal"data-target="#deletegenre{{ $g->id }}">Delete</a>
                                    @include('genre.delete')
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
