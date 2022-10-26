@extends('template')

@section('content')

<!-- Signup Section Begin -->
<section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Ready to edit</h3>

                        <form action="{{ route('film.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input__item">
                                <input id="nama_film" type="text" class="form-control" name="nama_film" value="{{ $data->nama_film }}" placeholder="Edit Film Name" required>
                                <span class="icon_id"></span>
                            </div>
                            <div class="input__item">
                                <input id="studio" type="text" class="form-control" name="studio" value="{{ $data->studio }}" placeholder="Edit Studio Name" required>
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input id="cover" type="text" class="form-control" name="cover" value="{{ $data->cover }}" placeholder="Edit Cover" required>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input id="harga" type="text" class="form-control" name="harga" value="{{ $data->harga }}" placeholder="Edit Harga" required>
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input id="tahun_rilis" type="text" class="form-control" name="tahun_rilis" value="{{ $data->tahun_rilis }}" placeholder="Edit Tahun Rrlis" required>
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input id="aktor" type="text" class="form-control" name="aktor" value="{{ $data->aktor }}" placeholder="Edit Actor" required>
                                <span class="icon_book"></span>
                            </div>
                            <div class="input__item">
                                <input id="sinopsis" type="text" class="form-control" name="sinopsis" value="{{ $data->sinopsis }}" placeholder="Edit Sinopsis" required>
                                <span class="icon_book"></span>
                            </div>
                            <div class="input__item">
                                <input id="trailer" type="text" class="form-control" name="trailer" value="{{ $data->trailer }}" placeholder="Edit Trailer" required>
                                <span class="icon_book"></span>
                            </div>
                            <div class="input__item">
                                <input id="full_movie" type="text" class="form-control" name="full_movie" value="{{ $data->full_movie }}" placeholder="Edit Full Movie" required>
                                <span class="icon_book"></span>
                            </div>
                            <div class="input__item">
                                <input id="genre_id" type="text" class="form-control" name="genre_id" value="{{ $data->genre_id }}" placeholder="Edit Genre" required>
                                <span class="icon_book"></span>
                            </div>
                            <div class="form-group mt-2">
                                <select class=" @error('sinopsis') is-invalid @enderror">
                                <option>Genre</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success text-white">Update</button>
                            <button class="btn btn-secondary"><a href="/film" class="text-white">Cancel</a></button>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>php artisan inspire</h3>
                        <ul class="text-white">
                        “ The only way to do great work is to love what you do. ”
                        </ul>
                        <ul class="text-secondary">
                        — Steve Jobs
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Signup Section End -->

@endsection
