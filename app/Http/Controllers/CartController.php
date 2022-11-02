<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Film;
use App\Models\Pay;
use App\Models\Pembayaran;
use App\Models\Token;
use Midtrans\Config;
use Midtrans\Snap;
use Cart;
// use Darryldecode\Cart;

class CartController extends Controller
{
  public function list()
  {
    $userid = Auth::user()->id;
    $item = Cart::session($userid)->getContent();
    $total = Cart::session($userid)->getTotal();
    $aa = Cart::session($userid);
    // dd($crt);

    return view('cart', compact('item'));
  }

  public function midt(Request $request)
    {
      $harga = $request->harga;
      // dd ($harga);
      // $orderid = $request->id;
      // $metode = $request->metode;
      // dd ($request);
    Config::$serverKey = 'SB-Mid-server-FgSMRXe6gp7YP34lYPxa3knw';
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => $harga,
        ),

      //   'item_details' => array(
      //     [
      //         'id' => '1',
      //         'price' => '70000',
      //         'quantity' => 1,
      //         'name' => 'Avengers: infinity war',
      //     ]
      // ),
        
        'customer_details' => array(
          'first_name' => Auth::user()->name,
          'last_name' => '',
          'email' => Auth::user()->email,
          'phone' => '',
      ),

    );

    $snapToken = Snap::getSnapToken($params);

    return json_encode($snapToken);
  }

  public function list_post(Request $request)
    {
      // return $request;
      $json = json_decode($request->get('json'));
      $pay = new Pay();
      $pay -> status = $json->status_message;
      $pay -> name = Auth::user()->id;
      $pay -> transaktion_id = $json->transaction_id;
      $pay -> order_id = $json->order_id;
      $pay -> transaction_time = $json->transaction_time;
      $pay -> gross_amount = $json->gross_amount;
      $pay -> payment_type = $json->payment_type;
      $pay -> payment_code = isset($json->payment_code) ? $json->payment_code : null;
      $pay -> pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

      $pay -> save();
      // return redirect('cart')->with('success', 'Success buy the movie');
      Alert::success('Congratulations', 'Success, buy the movie');
      return redirect('cart');
    }

  public function add_cart(Request $request, $id)
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

      return redirect('dash')->with('success', 'berhasil menambah keranjang');
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

        return redirect('detail/' .$id)->with('success', 'berhasil menambah keranjang');
      }


    public function del_cart($id)
    {
      $userid = Auth::user()->id;
      Cart::session($userid)->remove($id);
      return redirect('cart');
    }

    public function checkout()
    {
      $userid = Auth::user()->id;
      $dtrans = array(
        'user_id' => $userid,
        'tgl_order'=>date('Y-m-d'),
        'total_pembayaran' => 0
      );
      $pembayaran = Pembayaran::create($dtrans);
      // dd($pembayaranid);
      if ($pembayaran) {
        $pembayaranid = $pembayaran->id;
        $faker = fake('id');
        foreach (Cart::session($userid)->getContent() as $cart) {
          $token = array(
            'film_id' => $cart->id,
            'pembayaran_id' => $pembayaranid,
            'token' => $faker->md5()
          );
          Token::create($token);
        }
        $dtrans = array(
          'total_pembayaran' => Cart::session($userid)->getTotal()
        );
        Pembayaran::where('id', $pembayaranid)->update($dtrans);
        Cart::session($userid)->clear();
      }
      return redirect('cart');

  }
}
