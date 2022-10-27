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
      dd($item);
      // return view('cart', compact('item'));
  }
  public function add_cart(Request $request, $id)
    {
<<<<<<< HEAD
      $datas = Film::where('id',$id)->first();
      $items=array(
        'id' => $id,
        'name' => $datas->nama_film,
        'price' => $datas->harga,
        'quantity' => 1
      );
      // if ($items['quantity'] > 1) {
      //   return redirect('dash')->with('error', 'quantity lebih dari 1');
      // }
      Cart::add($items);
      return redirect('dash')->with('success', 'berhasil menambah keranjang');
=======
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
>>>>>>> b28fe5e422becdfb5bbee0bac2e7ec5508365645

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
