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
    <td><a href="{{ url('delcart/'.$cart->id) }}" class="btn btn-danger">X</a></td>
  </tr>
  @endforeach
  </table>
  <a href="{{url('checkout')}}" class="btn btn-primary mb-5">Checkout</a>
  <a id="bayar" class="btn btn-primary text-white mb-5">Pay Midrans</a>

</div>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3WReVvYy5X8PmIaz"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
    $('#bayar').click(function(e){
      e.preventDefault();

      $.ajax({
        type: "get",
        url: "midt",
        data: {
          // id: '7786',
          harga: '100000',
          // metode: 'bca_va',
          // metode: 'shopeepay'
        },
        dataType: "json",
        success: function (response){
            console.log(response);
          snap.pay(response, {
          onSuccess: function(result){
          },
          onPending: function(result){
          },
          onError: function(result){
          }
        });
        }
      });
    });
      
    </script>
@endsection