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
  public function add_cart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'nama_film' => $request->nama_film,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'attributes' => array(
                'cover' => $request->cover,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }
}
