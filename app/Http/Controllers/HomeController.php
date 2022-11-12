<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        $user = Auth::user()->id;
        $data = Profile::where('user_id', $user)->get();
        return view('home',compact('genre', 'user', 'data'));
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

    public function uploadstore(Request $request)
    {
        $file = $request->file('ava')->store('upload');
        Profile::create([
            'user_id' => Auth::user()->id,
            'ava' => $file,
        ]);
        return redirect('home');
    }

    public function uploadedit(Request $request, $id)
    {
        $data = Profile::findOrFail($id);
        $file = $request->file('ava')->store('upload');
        $data->update([
            'ava' => $file,
        ]);

        return redirect('home');
    }
}
