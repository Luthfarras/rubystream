<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // public function template()
    // {
    //     $userid = Auth::user()->id;
    //     return view('template', compact('userid'));
    // }

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
