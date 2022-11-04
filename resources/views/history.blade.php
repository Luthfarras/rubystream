@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center text-white mt-5">
            History Purchase
        </h2>
        @foreach ($tanggal as $dd)
            <table class="table text-white mt-5">
                <thead>
                    <tr>
                        <td style="border: 0;" scope="row">{{ $dd->tgl_order }}</td>
                    </tr>
                    <tr class="text-center">
                        <th style="border: 0; width:20%;" scope="col">Film</th>
                        <th style="border: 0; width:20%;" scope="col">Cover</th>
                        <th style="border: 0; width:20%;" scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($data as $d)
                        @if ($d->tgl_order == $dd->tgl_order)
                            <tr class="text-center">
                                <td style="border: 0;" class="align-middle text-left" scope="row">{{ $d->nama_film }}
                                </td>
                                <td style="border: 0;" class="align-middle" scope="row"><img src="{{ $d->cover }}"
                                        alt="" width="50%"></td>
                                <td style="border: 0;" class="align-middle" scope="row">{{ $d->harga }}</td>
                                <td style="border: 0;" class="align-middle">
                                    <a href="dashboard"></a>
                                </td>
                                <td style="border: 0;">
                                    <a class="btn btn-danger" href="">Delete</a>
                                </td>
                            </tr>
                            @php
                                
                                $total += $d->harga;
                            @endphp
                        @endif
                    @endforeach
                </tbody>

                <tr class="text-center">
                    {{-- {{ $total+= }} --}}
                    <td style="border: 0;" class="align-middle" scope="row">Jumlah</td>
                    <td style="border: 0;" class="align-middle" scope="row">{{ $total }}</td>
                </tr>
            </table>
        @endforeach
    </div>
@endsection
