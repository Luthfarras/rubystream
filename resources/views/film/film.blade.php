@extends('template')
@section('content')
{{ dd($data )}}
@section('hero')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <tr class="text-white">
                    <th scope="col">No</th>
                    <th scope="col">Judul Film</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tahun Rilis</th>
                    <th scope="col">Aksi</th>
                </tr>
                <tr class="text-white">
                    @foreach ($data as $dt)
                        <td scope="col">No</td>
                        <td scope="col">Judul Film</td>
                        <td scope="col">Genre</td>
                        <td scope="col">Harga</td>
                        <td scope="col">Tahun Rilis</td>
                        <td scope="col">Aksi</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
