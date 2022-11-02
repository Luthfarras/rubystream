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
// use Darryldecode\Cart\Cart;

class CartController extends Controller
{
  public function list( Request $request )
  {

    $userid = Auth::user()->id;
    $item = Cart::session($userid)->getContent();
    $total = Cart::session($userid)->getTotal();
    $aa = Cart::session($userid);

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
          // "credit_card",
          // "gopay",
          "shopeepay",
          // "permata_va",
          // "bca_va",
          // "bni_va",
          // "bri_va",
          // "echannel",
          // "other_va",
          // "danamon_online",
          // "mandiri_clickpay",
          // "cimb_clicks",
          // "bca_klikbca",
          // "bca_klikpay",
          // "bri_epay",
          // "xl_tunai",
          // "indosat_dompetku",
          // "kioson",
          // "Indomaret",
          // "alfamart",
          // "akulaku"
        ],

      //   'item_details' => array(
      //     [
      //         'id' => rand(),
      //         'price' => $total,
      //         'quantity' => 1,
      //         'name' => $item,
      //     ]
      // ),
        
        'customer_details' => array(
            'first_name' => Auth::user()->name,
            'last_name' => '',
            'email' => Auth::user()->email,
            'phone' => rand(),
        ),
    );

    $snapToken = Snap::getSnapToken($params);

    // dd($crt);
    return view('cart', ['snap_token'=>$snapToken], compact('item'));
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
      // $items=array(
      //   'id' => $id,
      //   'name' => $datas->nama_film,
      //   'price' => $datas->harga,
      //   'quantity' => 1,
      //   'attributes' => array(
      //     'image' => $datas->cover
      //   )
      // );
      // dd($item);
      // if ($items['quantity'] > 1) {
      //   return redirect('dash')->with('error', 'quantity lebih dari 1');
      // }

      Cart::session($userid)->add(array(
        'id' => $id,
        'name' => $datas->nama_film,
        'price' => $datas->harga,
        'quantity' => 1,
        'attributes' => array(
          'image' => $datas->cover
        )
      ));

      return redirect('dash')->with('success', 'Successfully added to cart');
        // \Cart::add([
        //     'id' => $request->id,
        //     'nama_film' => $request->nama_film,
        //     'harga' => $request->harga,
        //     'qty' => $request->qty,
        //     'attributes' => array(
        //         'cover' => $request->cover,
        //     )
        // ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');

      // dd($request);
        // \Cart::add([
        //     'id' => $request->id,
        //     'nama_film' => $request->nama_film,
        //     'harga' => $request->harga,
        //     'qty' => $request->qty,
        //     'attributes' => array(
        //         'cover' => $request->cover,
        //     )
        // ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');
        //
        // return redirect()->route('cart.list');
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
