@extends('template')

@section('content')

<div class="container">
  <table class="table text-white">
  <tr>
    <th>No</th>
    <th>Judul</th>
    <th>Cover</th>
    <th>Harga</th>
    <th>Aksi</th>
  </tr>
  @foreach($item as $cart)
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$cart->name}}</td>
    <td> <img src="{{$cart->attributes->image}}" alt="" width="100px"> </td>
    <td>{{$cart->price}}</td>
    <td><a href="" class="btn btn-danger">X</a></td>
  </tr>
  @endforeach
  </table>

</div>

@endsection
