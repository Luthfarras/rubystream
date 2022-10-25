@extends('template')

@section('content')

<!-- Signup Section Begin -->
<section class="signup spad">
        <div class="container" style="height:43vh">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Ready to edit</h3>

                        <form action="{{ route('genre.update', $data->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                            <div class="input__item">
                                <input id="genre" type="text" class="form-control" name="genre" value="{{ $data->genre }}" placeholder="Edit Genre Name" required>
                                <span class="icon_book"></span>
                            </div>
                            <button type="submit" class="btn btn-success text-white">Update</button>
                            <button class="btn btn-secondary"><a href="/genre" class="text-white">Cancel</a></button>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>php artisan inspire</h3>
                        <ul class="text-white">
                        “ Happiness is not something readymade. It comes from your own actions. ”
                        </ul>
                        <ul class="text-secondary">
                        — Dalai Lama
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Signup Section End -->

@endsection