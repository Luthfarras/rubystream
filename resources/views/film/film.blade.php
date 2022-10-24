@extends('template')
@section('content')
@section('hero')

<div class="form-group container">
    <a class="btn btn-dark" href="">Add</a>
</div>

<div class="container text-light" id="body">
    <div class="ms-auto me-auto">
        <table class="table" id="datatable">
            <thead>
                <tr class="text-white">
                    <th scope="col">No</th>
                    <th scope="col">Judul Film</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tahun Rilis</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr class="text-white">
                        <td scope="col">{{ $dt->id }}</td>
                        <td scope="col">{{ $dt->nama_film }}</td>
                        <td scope="col">{{ $dt->genre }}</td>
                        <td scope="col">{{ $dt->harga }}</td>
                        <td scope="col">{{ $dt->tahun_rilis }}</td>
                        <td scope="col">
                            <a href="" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
