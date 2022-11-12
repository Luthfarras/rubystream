<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Pembayaran;
use App\Models\Rating;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\Paginate\Paginator;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
      $userid = Auth::user();
      if ($userid) {
          $cart = Cart::session($userid->id)->getContent();

      }else{
          $cart = Cart::getContent();
      }

      // foreach ($cart as $c) {
      //   $a = $c['id'];
      // }
      // dd($a);

      //
      // $get = [];

      // dd($get);
      // $user_id = Auth::user()->id;
      $genre = Genre::all();
      $data = Film::paginate(24);
    //   $data2 = Film::join('tokens', 'films.id', '=', 'tokens.film_id')
    //   ->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')
    //   ->where('pembayarans.user_id', '=', $user_id)->where('films.id', '=', 1)->exists();
    //   if ($data2) {
    //     echo "watch this movie";
    //   }else {
    //     echo "add to cart";
    //   }

      // $data = DB::table('films')->select('films.id')->join('tokens', 'films.id', '=', 'tokens.film_id')
      // ->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')->where('pembayarans.user_id', '=', $user_id)->get();
      // $data2 = DB::table('films')->select('*')->where('films.id', '<>', $data)->get();
      // $data2 = Film::select('films.id')->get();
      // if ($data2 != $data) {
      //   // echo $data2;
      //   return view('dashboard', compact('data2', 'cart', 'genre'));
      //
      // }
      // dd($data2);
      // foreach($data as $d){
      //     // echo $dd['id'];
      //     foreach($cart as $c){
      //         if($d['id'] != $c['id']){
      //             echo $c['id'];
      //
      //         }
      //         // $get[] = $a['id'];
      //     }
      //   }


      return view('dashboard', compact('data', 'cart', 'genre'));
    }

    public function dashboard2()
    {
        $userid = Auth::user();
        if ($userid) {
            $cart = Cart::session($userid->id)->getContent();

        }else{
            $cart = Cart::getContent();
        }

        $data2 = Film::join('tokens', 'films.id', '=', 'tokens.film_id')
        ->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')
        ->where('pembayarans.user_id', '=', Auth::user()->id)->get();
        //
        // Film::join('tokens', 'films.id', '=', 'tokens.film_id')->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')->where('pembayarans.user_id', '=', Auth::user()->id)->where('films.id', '=', $d->id)->exists()
        // $get = [];

        // dd($get);
        $genre = Genre::all();
        $data = Film::paginate(24);

        return view('dashboard2', compact('data', 'data2', 'cart', 'genre'));
    }

    public function detail($id)
    {
        $data = Film::findOrFail($id);
        $genre = Genre::all();
        $rate = Rating::all();
        $cart = Cart::session(Auth::user()->id)->getContent();
        return view('detail', compact('data', 'genre', 'rate', 'cart'));
    }

    public function watch($id)
    {
        $data = Film::findOrFail($id);
        $genre = Genre::all();
        // dd($id);
        // $filmid = $id;
        $user_id = Auth::user()->id;
        $data2 = Pembayaran::select('user_id')->join('tokens','tokens.pembayaran_id','=','pembayarans.id')
        ->where('pembayarans.user_id','=', $user_id)->where('tokens.film_id', '=', $id)->exists();

        if (Auth::user()->role == 'admin') {
          return view('watch', compact('data', 'genre'));
        }elseif (Auth::user()->role == 'user' && $data2 === true) {
          return view('watch', compact('data', 'genre'));
        }else {
          Alert::error('Warning', 'This film is not purcashed yet!');
          return redirect('detail/'.$id);
        }
        // dd($user_id);
        // $data4 = Pembayaran::where('user_id','=', 3)->exists();
        // dd($data4);
                // dd($data4);
        //  dd($data2);
        // if ($data2 === true) {
        // }else{
        // }
        // foreach ($data2 as $d2) {
        //     if ($d2->user_id == $user_id) {
        //         $datasatu = $d2->user_id;
        //     }
        // }

        // $data3 = Token::select('film_id')->join('pembayarans','tokens.pembayaran_id','=','pembayarans.id')
        // ->where('tokens.film_id', '=', $id)->get();
        // foreach ($data3 as $d3) {

        //     if ($d3->film_id == $id) {
        //         $datatiga = $d3->film_id;
        //     }
        // }
        // // dd($data3);
        // $genre = Genre::all();
        // $genre = DB::table('films')->select('genre_id')->join('genres','films.genre_id','=','genres.id');
        // return view('watch', compact('data', 'id', 'datasatu', 'datatiga', 'genre'));
    }

    public function trailer($id)
    {
      $data = Film::findOrFail($id);
      $genre = Genre::all();
      return view('trailer', compact('data', 'genre'));
    }

    public function category($id)
    {
        $userid = Auth::user();
        if ($userid) {
            $cart = Cart::session($userid->id)->getContent();

        }else{
            $cart = Cart::getContent();
        }
        $data = Film::select('*')->join('genres', 'genres.id', '=', 'films.genre_id')->where('genres.id', '=', $id)->paginate(18);
        // $data = Film::where('films.id','>',100)->paginate(10);
        $genre = Genre::all();
        return view('category', compact('data', 'genre', 'cart'));
    }

    // public function category(Request $request)
    // {
    //   $data = Film::all();
    //     return view('watch', compact('data'));
    // }
    //

    public function rating(Request $request)
    {
      // dd($request);
      $userid = Auth::user()->id;
      Rating::create([
        'ulasan' => $request->ulasan,
        'rating' => $request->rating,
        'film_id' => $request->film_id,
        'users_id' => $userid,
      ]);
      return redirect()->back();
    }

    public function search(Request $request)
  	{
        $userid = Auth::user();
        if ($userid) {
            $cart = Cart::session($userid->id)->getContent();
  
        }else{
            $cart = Cart::getContent();
        }

        $genre = Genre::all();
  		$cari = $request->search;
        $data = Film::where('nama_film', 'like', "%" . $cari . "%")->paginate();

  		return view('dashboard', compact('data', 'genre', 'cart'));

  	}


    public function index()
    {
        $userid = Auth::user();
        if ($userid) {
            $cart = Cart::session($userid->id)->getContent();

        }else{
            $cart = Cart::getContent();
        }
        $data = Film::all();
        $genre = Genre::all();
        return view('film.film', compact('data', 'cart', 'genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = Film::create($request->all());
        $film = $request->file('cover','trailer','full_movie')->store('upload');
        Alert::success('Congratulations', 'Create Film Success');
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::all();
        $data = Film::findOrFail($id);
        $genre = Genre::all();

        return view('film.edit', compact('data','genre'));
        return view('film.edit', compact('data', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Film::findOrFail($id);
        $data->update($request->all());

        Alert::success('Congratulations', 'Update Film Success');
        return redirect('film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $film->delete();

        Alert::success('Deleted', 'Film has succesful deleted');
        return redirect('/film');
    }
}
