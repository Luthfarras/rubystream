<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\Genre;
use App\Models\Film;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genre = Genre::all();
        return view('home',compact('genre'));
    }

    public function template()
    {
      $genre = Genre::all();
        return view('template', compact('genre'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>['string'],
            'username'=>['alpha_num'],
            'email'=>['email'],
            'password' => ['string', 'confirmed'],
        ]);
        $user = Auth::user();
        $user->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request['password']),
        ]);

        Alert::success('Congratulations', 'Update Profil Success');
        return redirect('home');
    }
}
