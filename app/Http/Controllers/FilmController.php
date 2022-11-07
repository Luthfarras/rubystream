<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Rating;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Paginate\Paginator;
use DB;
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
        $data = Film::paginate(20);
        $genre = Genre::all();
        return view('dashboard', compact('data', 'genre'));
    }

    public function dashboard2()
    {
        $userid = Auth::user();
        if ($userid) {
            $cart = Cart::session($userid->id)->getContent();
            
        }else{
            $cart = Cart::getContent();
        }
        // 
        // $get = [];
        
        // dd($get);
        $genre = Genre::all();
        $data = Film::paginate(20);


        // tampilan button add cart (pindah blade)
        foreach($data as $dd){
            // echo $dd['id'];
            foreach($cart as $a){
                if($dd['id'] != $a['id']){
                    echo $dd['id'];

                }
                // $get[] = $a['id'];
            }
        }

        return view('dashboard2', compact('data', 'cart', 'genre'));
    }

    public function detail($id)
    {
        $data = Film::findOrFail($id);
        $genre = Genre::all();
        return view('detail', compact('data', 'genre'));
    }

    public function watch($id)
    {
        $data = Film::findOrFail($id);
        $genre = Genre::all();
        return view('watch', compact('data', 'genre'));
    }

    public function category()
    {
        $data = Film::paginate(20);
        $genre = Genre::all();
        return view('category', compact('data', 'genre'));
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
      return redirect('/');
    }

    public function search(Request $request)
  	{
      $genre = Genre::all();
  		$cari = $request->search;
          $data = Film::where('nama_film', 'like', "%" . $cari . "%")->paginate();

  		return view('dashboard', compact('data', 'genre'));

  	}


    public function index()
    {
        $data = Film::all();
        $genre = Genre::all();
        return view('film.film', compact('data', 'genre'));
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
