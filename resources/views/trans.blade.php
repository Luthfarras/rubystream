@extends('template')

@section('content')
    <div class="container mb-5">
        <h2 class="text-center text-white mt-5">
            Transaction History
        </h2>
        @foreach ($trans as $dd)
            <table class="table text-white mt-5 mb-5">
                <thead>
                    <tr>
                        <td style="border: 0;" scope="row">{{ $dd->user->name }}</td>
                    </tr>
                    <tr class="text-center">
                        <th style="border: 0; width:30%;" scope="col">Film</th>
                        <th style="border: 0; width:30%;" scope="col">Tanggal</th>
                        <th style="border: 0; width:30%;" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($film as $d)
                        @if ($d->user_id == $dd->user_id)
                            <tr class="text-center">
                                <td style="border: 0;" class="align-middle text-left" scope="row"><a href="{{route('detail',$d->id)}}">{{ $d->nama_film }}</a>
                                </td>
                                <td style="border: 0;" class="align-middle" scope="row">{{ $d->tgl_order }}</td>
                                <td style="border: 0;" class="align-middle" scope="row"><span class="badge badge-success">{{ $d->status }}</span></td>
                                <td style="border: 0;" class="align-middle">
                                    <a href="dashboard"></a>
                                </td>
                            </tr>
                            @php

                                $total += $d->total_pembayaran;
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
