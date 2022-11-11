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
// use Darryldecode\Cart\Cart;

class CartController extends Controller
{
  public function list( Request $request )
  {

    $userid = Auth::user()->id;
    $item = Cart::session($userid)->getContent();
    // dd($item);
    // foreach($item as $a){
    //   echo $a['id'];
    // }
    // print_r($item[1]['id']);
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

      //   'item_details' => array(
      //     [
      //         'id' => $idbar,
      //         'price' => $total,
      //         'quantity' => $qty,
      //         'name' => $nama,
      //     ]
      // ),

        'customer_details' => array(
            'first_name' => Auth::user()->name,
            'last_name' => '',
            'email' => Auth::user()->email,
            'phone' => rand(),
        ),
    );
    $genre = Genre::all();
    $snapToken = Snap::getSnapToken($params);

    // dd($crt);
    return view('cart', ['snap_token'=>$snapToken], compact('item','genre'));
    }
  }

  public function list_post(Request $request)
    {
      // return $request;
      $userid = Auth::user()->id;
      $json = json_decode($request->get('json'));
      $pay = new Pembayaran();
      $pay -> user_id = Auth::user()->id;
      $pay -> tgl_order = date('Y-m-d');
      $pay -> total_pembayaran = $json->gross_amount;
      $pay -> via_pembayaran = $json->payment_type;
      $pay -> status = $json->status_message;
      // $pay -> transaktion_id = $json->transaction_id;
      // $pay -> order_id = $json->order_id;
      // $pay -> payment_code = isset($json->payment_code) ? $json->payment_code : null;
      // $pay -> pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

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
      // Alert::success('Congratulations', 'Success, buy the movie');
      // return redirect('dash');
    }

  public function add_cart(Request $request, $id)
    {
      $userid = Auth::user()->id;
      $datas = Film::findOrFail($id);
      $item = Cart::session($userid)->getContent();
      // foreach ($item as $cart) {
      //   if ($cart['id'] == $id) {
      //     return redirect('/')->with('error', 'this item is already on cart');
      //   }
      // }
      // if ($item['id']) {
      //   // code...
      // }
      // foreach($item as $a){
      //   if($a['id'] == $id){
      //     return redirect('dash')->with('error', 'quantity lebih dari 1');
      //   }
      // }
      // if ($item[1]['id'] == $id) {
      //   return redirect('dash')->with('error', 'quantity lebih dari 1');
      // }else{
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
      // }
      // dd($item[1]['id']);
      // print_r($item[1]['id']);
      // $item = Cart::getContent
      // $item[1]['id']
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

  //   public function checkout()
  //   {
  //     $userid = Auth::user()->id;
  //     $dtrans = array(
  //       'user_id' => $userid,
  //       'tgl_order'=>date('Y-m-d'),
  //       'total_pembayaran' => 0
  //     );
  //     $pembayaran = Pembayaran::create($dtrans);
  //     // dd($pembayaranid);
  //     if ($pembayaran) {
  //       $pembayaranid = $pembayaran->id;
  //       $faker = fake('id');
  //       foreach (Cart::session($userid)->getContent() as $cart) {
  //         $token = array(
  //           'film_id' => $cart->id,
  //           'pembayaran_id' => $pembayaranid,
  //           'token' => $faker->md5()
  //         );
  //         Token::create($token);
  //       }
  //       $dtrans = array(
  //         'total_pembayaran' => Cart::session($userid)->getTotal()
  //       );
  //       Pembayaran::where('id', $pembayaranid)->update($dtrans);
  //       Cart::session($userid)->clear();
  //     }
  //     Alert::success('Congratulations', 'Success, buy the movie');
  //     return redirect('dash');

  // }
}
