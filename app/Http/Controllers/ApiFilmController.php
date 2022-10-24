<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class ApiFilmController extends Controller
{
    // public function getData()
    // {
    //     $client = new Client();
    //     $response = $client->request('GET','https://imdb8.p.rapidapi.com/auto-complete');
    //     $statusCode = $response->getStatusCode();

    //     echo $response->getBody();
    // }

    public function getdata()
    {
        $data = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_ozkz53hd?release_date=1900-01-01,2022-01-01&genres=action&companies=warner');
        $diti = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_ozkz53hd?release_date=1900-01-01,2022-01-01&genres=romance&companies=warner');
        $dutu = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_ozkz53hd?release_date=1900-01-01,2022-01-01&genres=horror&companies=warner');
        $dete = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_ozkz53hd?release_date=1900-01-01,2022-01-01&genres=comedy&companies=warner');
        $doto = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_ozkz53hd?release_date=1900-01-01,2022-01-01&genres=fantasy&companies=warner');
        // dd($data->JSON());
        // $th = (int)$data['description'];

        // dd($th->json());
        // return view('film.film',compact('data'));
        // Film::create([
        //     'nama_film' => $data->title,
        // ])
        foreach ($data['results'] as $item) {
            Film::create([
             'nama_film' => $item['title'],
             'studio' => 'Warner Bros',
             'cover' => $item['image'],
             'harga' => 70000,
             'tahun_rilis' => $item['description'],
             'aktor' => $item['stars'],
             'sinopsis' => $item['plot'],
             'trailer' => 'haha.mp4',
             'full_movie' => 'hihi.mp4',
             'genre_id' => 1
            ]);
        }
        foreach ($diti['results'] as $item) {
            Film::create([
             'nama_film' => $item['title'],
             'studio' => 'Warner Bros',
             'cover' => $item['image'],
             'harga' => 70000,
             'tahun_rilis' => $item['description'],
             'aktor' => $item['stars'],
             'sinopsis' => $item['plot'],
             'trailer' => 'haha.mp4',
             'full_movie' => 'hihi.mp4',
             'genre_id' => 2
            ]);
        }
        foreach ($dutu['results'] as $item) {
            Film::create([
             'nama_film' => $item['title'],
             'studio' => 'Warner Bros',
             'cover' => $item['image'],
             'harga' => 70000,
             'tahun_rilis' => $item['description'],
             'aktor' => $item['stars'],
             'sinopsis' => $item['plot'],
             'trailer' => 'haha.mp4',
             'full_movie' => 'hihi.mp4',
             'genre_id' => 3
            ]);
        }
        foreach ($dete['results'] as $item) {
            Film::create([
             'nama_film' => $item['title'],
             'studio' => 'Warner Bros',
             'cover' => $item['image'],
             'harga' => 70000,
             'tahun_rilis' => $item['description'],
             'aktor' => $item['stars'],
             'sinopsis' => $item['plot'],
             'trailer' => 'haha.mp4',
             'full_movie' => 'hihi.mp4',
             'genre_id' => 4
            ]);
        }
        foreach ($doto['results'] as $item) {
            Film::create([
             'nama_film' => $item['title'],
             'studio' => 'Warner Bros',
             'cover' => $item['image'],
             'harga' => 70000,
             'tahun_rilis' => $item['description'],
             'aktor' => $item['stars'],
             'sinopsis' => $item['plot'],
             'trailer' => 'haha.mp4',
             'full_movie' => 'hihi.mp4',
             'genre_id' => 5
            ]);
        }

        return redirect('film');
    }
    // public function aaa(){
    //     $collection = Str::of('(2002)')->explode(' ');
    //     dd($collection);
    // }
}
