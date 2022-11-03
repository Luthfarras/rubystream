<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
      User::create([
        'name' => 'admin',
        'username' => 'admin123',
        'email' => 'admin@gmail.com',
        'password' => Hash::make(12345678),
        'role' => 'admin'
      ]);
        
      User::create([
        'name' => 'admin',
        'username' => 'admin1234',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin1234'),
        'role' => 'admin'
      ]);

      User::create([
        'name' => 'user',
        'username' => 'user1234',
        'email' => 'user@mail.com',
        'password' => Hash::make('user1234'),
        'role' => 'user'
      ]);

      Genre::create([
        'genre' => 'Action'
      ]);
      Genre::create([
        'genre' => 'Romance'
      ]);
      Genre::create([
        'genre' => 'Horror'
      ]);
      Genre::create([
        'genre' => 'Comedy'
      ]);
      Genre::create([
        'genre' => 'Fantasy'
      ]);

      $this->call(FilmSeeder::class);

      // Film::create([
      //   'nama_film' => 'Apa Nama Film 1',
      //   'studio' => 'Nama Film',
      //   'cover' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
      //   'harga' => '10000',
      //   'tahun_rilis' => '2001',
      //   'aktor' => 'Nama',
      //   'sinopsis' => 'sinopsis',
      //   'trailer' => 'haha.mp4',
      //   'full_movie' => 'haha.mp4',
      //   'genre_id' => '1',
      // ]);
      // Film::create([
      //   'nama_film' => 'Apa Nama Film 2',
      //   'studio' => 'Nama Film',
      //   'cover' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
      //   'harga' => '10000',
      //   'tahun_rilis' => '2001',
      //   'aktor' => 'Nama',
      //   'sinopsis' => 'sinopsis',
      //   'trailer' => 'haha.mp4',
      //   'full_movie' => 'haha.mp4',
      //   'genre_id' => '1',
      // ]);
      // Film::create([
      //   'nama_film' => 'Apa Nama Film 3',
      //   'studio' => 'Nama Film',
      //   'cover' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
      //   'harga' => '10000',
      //   'tahun_rilis' => '2001',
      //   'aktor' => 'Nama',
      //   'sinopsis' => 'sinopsis',
      //   'trailer' => 'haha.mp4',
      //   'full_movie' => 'haha.mp4',
      //   'genre_id' => '1',
      // ]);
      // Film::create([
      //   'nama_film' => 'Apa Nama Film 4',
      //   'studio' => 'Nama Film',
      //   'cover' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
      //   'harga' => '10000',
      //   'tahun_rilis' => '2001',
      //   'aktor' => 'Nama',
      //   'sinopsis' => 'sinopsis',
      //   'trailer' => 'haha.mp4',
      //   'full_movie' => 'haha.mp4',
      //   'genre_id' => '1',
      // ]);
      // Film::create([
      //   'nama_film' => 'Apa Nama Film 5',
      //   'studio' => 'Nama Film',
      //   'cover' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
      //   'harga' => '10000',
      //   'tahun_rilis' => '2001',
      //   'aktor' => 'Nama',
      //   'sinopsis' => 'sinopsis',
      //   'trailer' => 'haha.mp4',
      //   'full_movie' => 'haha.mp4',
      //   'genre_id' => '1',
      // ]);

    }
}
