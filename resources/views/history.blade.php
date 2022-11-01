@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center text-white mt-5">
            History Purchase
        </h2>
        <table class="table text-white mt-5">
            <thead>
                <tr>
                    <td style="border: 0;" scope="row">{{ $data[0]->tgl_order }}</td>
                </tr>
                <tr>
                    <th style="border: 0; width:20%;" scope="col">Film</th>
                    <th style="border: 0; width:20%;" scope="col">Cover</th>
                    <th style="border: 0; width:20%;" scope="col">Price</th>
                    <th style="border: 0; width:20%;" scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                        <td style="border: 0;" scope="row">{{ $d->nama_film }}</td>
                        <td style="border: 0;" scope="row"><img src="{{ $d->cover }}" alt=""></td>
                        <td style="border: 0;" scope="row">{{ $d->harga }}</td>
                        <td style="border: 0;" scope="row">{{ $d->total_pembayaran }}</td>
                        <td style="border: 0;">
                            <a href="dashboard"></a>
                        </td>
                        <td style="border: 0;">
                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
