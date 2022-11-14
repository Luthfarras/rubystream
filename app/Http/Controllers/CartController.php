<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Pembayaran;
use App\Models\Token;
use Midtrans\Config;
use Midtrans\Snap;
use Cart;

class CartController extends Controller
{
  public function list( Request $request )
  {

    $userid = Auth::user()->id;
    $item = Cart::session($userid)->getContent();
    $total = Cart::session($userid)->getTotal();
    $aa = Cart::session($userid);

    if ($total == 0) {
      Alert::error('Warning', 'Your cart is empty');
      return redirect('/');
  }else{

    Config::$serverKey = 'SB-Mid-server-FgSMRXe6gp7YP34lYPxa3knw';
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => $total,
        ),

        "enabled_payments" => [
          "bank_transfer",
          "shopeepay",
        ],


        'customer_details' => array(
            'first_name' => Auth::user()->name,
            'last_name' => '',
            'email' => Auth::user()->email,
            'phone' => rand(),
        ),
    );
    $genre = Genre::all();
    $snapToken = Snap::getSnapToken($params);

    return view('cart', ['snap_token'=>$snapToken], compact('item','genre'));
    }
  }

  public function list_post(Request $request)
    {
      $userid = Auth::user()->id;
      $json = json_decode($request->get('json'));
      $pay = new Pembayaran();
      $pay -> user_id = Auth::user()->id;
      $pay -> tgl_order = date('Y-m-d');
      $pay -> total_pembayaran = $json->gross_amount;
      $pay -> via_pembayaran = $json->payment_type;
      $pay -> status = $json->status_message;

      $pay -> save();
      if ($pay) {
      $payid = $pay->id;
        $faker = fake('id');
        foreach (Cart::session($userid)->getContent() as $cart) {
          $token = array(
            'film_id' => $cart->id,
            'pembayaran_id' => $payid,
            'token' => $faker->md5()
          );
          Token::create($token);
        }
        Cart::session($userid)->clear();
      }

      return redirect('/')->with('success', 'Success buy the movie');
    }

  public function add_cart(Request $request, $id)
    {
      $userid = Auth::user()->id;
      $datas = Film::findOrFail($id);
      $item = Cart::session($userid)->getContent();
        Cart::session($userid)->add(array(
          'id' => $id,
          'name' => $datas->nama_film,
          'price' => $datas->harga,
          'quantity' => 1,
          'attributes' => array(
            'image' => $datas->cover
          )
        ));

        return redirect('/')->with('success', 'Successfully added to cart');
    }

    public function add_cart2(Request $request, $id)
      {
        $userid = Auth::user()->id;
        $datas = Film::findOrFail($id);

        Cart::session($userid)->add(array(
          'id' => $id,
          'name' => $datas->nama_film,
          'price' => $datas->harga,
          'quantity' => 1,
          'attributes' => array(
            'image' => $datas->cover
          )
        ));

        return redirect('detail/' .$id)->with('success', 'Successfully added to cart');
      }


    public function del_cart($id)
    {
      $userid = Auth::user()->id;
      Cart::session($userid)->remove($id);
      return redirect('cart');
    }

}
