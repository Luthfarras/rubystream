<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Pembayaran;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = Genre::all();
        $user = Auth::user()->id;
        $tanggal = DB::table('pembayarans')->select('tgl_order')->where('pembayarans.user_id','=',$user)->get();
        $data = DB::table('tokens')->select('*')->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')
        ->join('films', 'films.id', '=', 'tokens.film_id')->where('pembayarans.user_id','=',$user)->get();
        return view('history',compact('tanggal','data','genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $genre = Genre::all();
        $trans = Pembayaran::select('*')->join('tokens', 'tokens.pembayaran_id', '=', 'pembayarans.id')
        ->join('films', 'tokens.film_id', '=', 'films.id')->get();
        return view('trans', compact('genre', 'trans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
