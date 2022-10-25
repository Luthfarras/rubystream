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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_s60165z4?release_date=1900-01-01,2022-01-01&genres=action&companies=warner');
        $diti = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_s60165z4?release_date=1900-01-01,2022-01-01&genres=romance&companies=dreamworks');
        $dutu = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_s60165z4?release_date=1900-01-01,2022-01-01&genres=horror&companies=paramount');
        $dete = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_s60165z4?release_date=1900-01-01,2022-01-01&genres=comedy&companies=fox');
        $doto = HTTP::get('https://imdb-api.com/API/AdvancedSearch/k_s60165z4?release_date=1900-01-01,2022-01-01&genres=fantasy&companies=disney');

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
             'studio' => 'DreamWorks',
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
             'studio' => 'Paramount',
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
             'studio' => '20th Century Fox',
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
             'studio' => 'Walt Disney',
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

    }
}
