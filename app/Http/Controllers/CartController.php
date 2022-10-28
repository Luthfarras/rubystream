<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use Cart;

class CartController extends Controller
{
  public function list()
  {
      $userid = Auth::user()->id;
      $item = Cart::session($userid)->getContent();
      $aa = Cart::session($userid);
      // dd($crt);
      return view('cart', compact('item'));
  }
  public function add_cart(Request $request, $id)
    {
      $userid = Auth::user()->id;
      $datas = Film::findOrFail($id);
      $items=array(
        'id' => $id,
        'name' => $datas->nama_film,
        'price' => $datas->harga,
        'quantity' => 1,
        'attributes' => array(
          'image' => $datas->cover
        )
      );
      $item = $items['id']->count();
      dd($item);
      // if ($items['quantity'] > 1) {
      //   return redirect('dash')->with('error', 'quantity lebih dari 1');
      // }

      // Cart::session($userid)->add(array(
      //   'id' => $id,
      //   'name' => $datas->nama_film,
      //   'price' => $datas->harga,
      //   'quantity' => 1,
      //   'attributes' => array(
      //     'image' => $datas->cover
      //   )
      // ));

      return redirect('dash')->with('success', 'berhasil menambah keranjang');
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
}
