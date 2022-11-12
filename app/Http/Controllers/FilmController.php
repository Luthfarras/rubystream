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
      $trend = Film::select('*')->orderBy('id', 'desc')->limit(3)->get();
      $genre = Genre::all();
      $data = Film::paginate(24);
      return view('dashboard', compact('data', 'cart', 'genre', 'trend'));
    }


    public function detail($id)
    {
        $data = Film::findOrFail($id);
        $genre = Genre::all();
        $rate = Rating::where('film_id', $id)->get();
        $rate2 = Rating::where('film_id', $id)->avg('rating');
        $rate3 = (float)$rate2;

        $userid = Auth::user();
        if ($userid) {
            $cart = Cart::session($userid->id)->getContent();

        }else{
            $cart = Cart::getContent();
        }
        return view('detail', compact('data', 'genre', 'rate', 'rate3', 'cart'));
    }

    public function watch($id)
    {
        $data = Film::findOrFail($id);
        $genre = Genre::all();
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

    public function rating(Request $request)
    {
      if (!Auth::user()) {
        Alert::warning('Failed', 'You should login first!');
      }else{
      $userid = Auth::user()->id;
      Rating::create([
        'ulasan' => $request->ulasan,
        'rating' => $request->rating,
        'film_id' => $request->film_id,
        'users_id' => $userid,
      ]);
      }
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
        $file_tr = $request->file('trailer')->store('upload');
        $file_fm = $request->file('full_movie')->store('upload');
        $film = Film::create([
            'nama_film' => $request->nama_film,
            'studio' => $request->studio,
            'cover' => $request->cover,
            'harga' => $request->harga,
            'tahun_rilis' => $request->tahun_rilis,
            'aktor' => $request->aktor,
            'sinopsis' => $request->sinopsis,
            'trailer' => $file_tr,
            'full_movie' => $file_fm,
            'genre_id' => $request->genre_id,
        ]);
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
        if ($request->file('trailer') && $request->file('full_movie')) {
            $file_tr = $request->file('trailer')->store('upload');
            $file_fm = $request->file('full_movie')->store('upload');
            $data->update([
                'nama_film' => $request->nama_film,
                'studio' => $request->studio,
                'cover' => $request->cover,
                'harga' => $request->harga,
                'tahun_rilis' => $request->tahun_rilis,
                'aktor' => $request->aktor,
                'sinopsis' => $request->sinopsis,
                'trailer' => $file_tr,
                'full_movie' => $file_fm,
                'genre_id' => $request->genre_id,
            ]);
        } else {
            $data->update([
                'nama_film' => $request->nama_film,
                'studio' => $request->studio,
                'cover' => $request->cover,
                'harga' => $request->harga,
                'tahun_rilis' => $request->tahun_rilis,
                'aktor' => $request->aktor,
                'sinopsis' => $request->sinopsis,
                'trailer' => $data->trailer,
                'full_movie' => $data->full_movie,
                'genre_id' => $request->genre_id,
            ]);
        }
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
