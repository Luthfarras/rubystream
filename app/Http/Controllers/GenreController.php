<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genre::all();
        // dd($data);
        return view('genre/genre', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Genre::all();
        // return view('genre.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'genre'=> 'required|string'
        ]);

        Genre::create($validator);

        Alert::success('Congratulations', 'Success Creates Genre');
        return redirect('genre');
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
        $data = Genre::findOrFail($id);

        return view('genre.edit', compact('data'));
        // dd($id);
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
        // dd($request);
        $data = Genre::findOrFail($id);
        $data->update($request->all());

        Alert::success('Congratulations', 'Update Genre Success');
        return redirect('genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Genre::findOrFail($id);
        $data->delete();

        Alert::success('Congratulations','Success Delete Genre');
        return redirect('genre');
        // dd($id);
    }
}
