<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Film;


class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_ozkz53hd?release_date=1900-01-01,2022-01-01&genres=action&companies=warner');

        foreach ($data['results'] as $item) {
            Film::create([
             'nama_film' => $item['title'],
             'studio' => 'Warner Bros',
             'cover' => $item['image'],
             'harga' => 70000,
             'tahun_rilis' => (int)$item['description'],
             'aktor' => $item['stars'],
             'sinopsis' => $item['plot'],
             'trailer' => 'haha.mp4',
             'full_movie' => 'hihi.mp4',
             'genre_id' => 1
            ]);
        }
    
    }
}
