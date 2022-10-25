@extends('template')
<div class="form-group container">
    <a class="btn btn-dark" href="" data-toggle="modal" data-target="#createfilm">Add</a>
@section('content')

<div class="form-group container mt-3">
    <a class="btn btn-dark" href="">Input Film</a>
>>>>>>> 5a2133ad86dc2949886bd0051d975a6c3ed2d89e
</div>
@include('film.filmcreate')

<div class="container text-light" id="body">
    <div class="ms-auto me-auto">
        <table class="table" id="datatable">
            <thead>
                <tr class="text-white">
                    <th scope="col" class="border border-0 text-center">No</th>
                    <th scope="col" class="border border-0 text-center">Judul Film</th>
                    <th scope="col" class="border border-0 text-center">Genre</th>
                    <th scope="col" class="border border-0 text-center">Harga</th>
                    <th scope="col" class="border border-0 text-center">Tahun Rilis</th>
                    @if(Auth::user()->role == 'admin')
                    <th scope="col" class="border border-0 text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr class="text-white">
                        <td scope="col" class="border border-0 align-middle text-center">{{ $dt->id }}</td>
                        <td scope="col" class="border border-0 align-middle">{{ $dt->nama_film }}</td>
                        <td scope="col" class="border border-0 align-middle text-center">{{ $dt->genre->genre }}</td>
                        <td scope="col" class="border border-0 align-middle text-center">{{ $dt->harga }}</td>
                        <td scope="col" class="border border-0 align-middle text-center">{{ $dt->tahun_rilis }}</td>
                        @if(Auth::user()->role == 'admin')
                        <td scope="col" class="border border-0 align-middle text-center">
                            <a class="btn btn-success" href="{{route('film.edit',$dt->id)}}">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
