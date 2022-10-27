<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Cart;

class CartController extends Controller
{
  public function list()
  {
      $item = Cart::getContent();
      // dd($cartItems);
      return view('cart', compact('item'));
  }
  public function add_cart(Request $request, $id)
    {
      $datas = Film::where('id',$id)->first();
      $items=array(
        'id' => $id,
        'name' => $datas->nama_film,
        'price' => $datas->harga,
        'quantity' => 1
      );
      Cart::add($items);
      return redirect('dash')->with('success', 'berhasil menambah keranjang');

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
