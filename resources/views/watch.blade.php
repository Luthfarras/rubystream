@extends('template')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/genre">Categories</a>
                        <a href="{{ url('category/' . $data->genre->id) }}">{{ $data->genre->genre }}</a>
                        <span>{{ $data['nama_film'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @guest
                        @if (Route::has('login'))
                        @endif
                    @endguest
                    <div class="anime__video__player">
                            <video id="player" playsinline controls data-poster="{{ $data['cover'] }}">
                                <source src="{{ asset('storage/' . $data->full_movie) }}" type="video/mp4" />
                                <track kind="captions" label="English captions" src="#" srclang="en" default />
                            </video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
