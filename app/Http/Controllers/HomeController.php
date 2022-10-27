<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;


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
        return view('home');
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
<<<<<<< HEAD
        Auth::user()->update([
            'name'=>$profil->name,
            'username'=>$profil->username,
            'email'=>$profil->email,
            'password'=>Hash::make($profil['password']),
=======

>>>>>>> dc44c61db95a98df8bd3efea3fb57f431532bd41
        auth()->user()->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request['password']),
        ]);

        Alert::success('Congratulations', 'Update Profil Success');
        return redirect('home');
    }
}
