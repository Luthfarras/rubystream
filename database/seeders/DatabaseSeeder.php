<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        'name' => 'admin2',
        'username' => 'admin1234',
        'email' => 'admin@mail.com',
        'password' => Hash::make('admin1234'),
        'role' => 'admin'
      ]);

      Genre::create([
        'genre' => 'aksi, romantis'
      ]);
      Genre::create([
        'genre' => 'drama, comedy'
      ]);
      Genre::create([
        'genre' => 'comedy, romantis'
      ]);
      Genre::create([
        'genre' => 'aksi, comedy'
      ]);
      Genre::create([
        'genre' => 'drama, aksi'
      ]);
      Genre::create([
        'genre' => 'drama, horror'
      ]);
      Genre::create([
        'genre' => 'horror, romantis'
      ]);
      Genre::create([
        'genre' => 'comedy, horror'
      ]);
      Genre::create([
        'genre' => 'aksi, horror'
      ]);
      Genre::create([
        'genre' => 'drama, horror'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);
      Genre::create([
        'genre' => 'aksi'
      ]);
      Genre::create([
        'genre' => 'drama'
      ]);
      Genre::create([
        'genre' => 'romantis'
      ]);
      Genre::create([
        'genre' => 'comedy'
      ]);

    }
}
