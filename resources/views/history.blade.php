@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center text-white">
            History Purchase
        </h2>
        <table id="datatable" class="table text-white">
            <thead>
                <tr>
                    <th style="border: 0; width:20%;" scope="col">Film</th>
                    <th style="border: 0; width:20%;" scope="col">Cover</th>
                    <th style="border: 0; width:20%;" scope="col">Price</th>
                    <th style="border: 0; width:20%;" scope="col">Total</th>
                    <th style="border: 0; width:20%;" scope="col">Date of Order</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 0;" scope="row"></td>
                    <td style="border: 0;" scope="row"></td>
                    <td style="border: 0;" scope="row"></td>
                    <td style="border: 0;">
                        <a href="dashboard"></a>
                    </td>
                    <td style="border: 0;">
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
