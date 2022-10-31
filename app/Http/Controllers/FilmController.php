<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\Paginate\Paginator;
use DB;
use Cart;

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
        $cart = Cart::getContent();
        $genre = Genre::all();
        $data = Film::paginate(20);
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

    // public function category(Request $request)
    // {
    //   $data = Film::all();
    //     return view('watch', compact('data'));
    // }
    //

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
