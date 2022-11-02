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
  <a href="#" id="bayar" class="btn btn-primary mb-5">Midrans Checkout</a>

</div>

<form action="" id="submit_form" method="POST">
  @csrf
  <input type="hidden" name="json" id="json_callback">
</form>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3WReVvYy5X8PmIaz"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      let payButton = document.getElementById('bayar');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snap_token}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });

      function send_response_to_form(result){
        document.getElementById('json_callback').value=JSON.stringify(result);
        $('#submit_form').submit();
      }
    </script>
@endsection