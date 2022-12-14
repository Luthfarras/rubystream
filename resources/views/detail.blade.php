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
                        <span>{{ $data->genre->genre }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ $data['cover'] }}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $data['nama_film'] }}</h3>
                                <span>{{ $data['nama_film'] }}</span>
                            </div>
                            <div class="anime__details__rating">
                                @if ($rate3 == 5)
                                <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                </div>                                    
                                @elseif($rate3 >= 4.5 && $rate3 <= 4.9)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                @elseif($rate3 >= 4 && $rate3 <= 4.4)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </div>
                                @elseif($rate3 >= 3.5 && $rate3 <= 3.9)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                @elseif($rate3 >= 3 && $rate3 <= 3.4)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </div>
                                @elseif($rate3 >= 2.5 && $rate3 <= 2.9)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                @elseif($rate3 >= 2 && $rate3 <= 2.4)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </div>
                                @elseif($rate3 >= 1.5 && $rate3 <= 1.9)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                @elseif($rate3 >= 1 && $rate3 <= 1.4)
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </div>
                                @else
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                </div>
                                @endif
                                <span>{{$rate->count()}} Votes</span>
                            </div>
                            <p>{{ $data['sinopsis'] }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Studios:</span> {{ $data['studio'] }}</li>
                                            <li><span>Year:</span> {{ $data['tahun_rilis'] }}</li>
                                            <li><span>Genre:</span> {{ $data->genre->genre }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <form class="" action="{{ url('cartlist2/' . $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <input type="hidden" name="nama_film" value="{{ $data['nama_film'] }}">
                                    <input type="file" name="cover" value="{{ $data['cover'] }}" hidden>
                                    <input type="hidden" name="harga" value="{{ $data['harga'] }}">
                                    @guest
                                    @if (Route::has('login'))
                                        @endif
                                    @else
                                        @if (Auth::user()->role == 'user')
                                            @if ($cart->where('id', $data->id)->count())
                                                <button class="follow-btn" disabled type="submit">In Cart</button>
                                            @elseif(DB::table('films')->join('tokens', 'films.id', '=', 'tokens.film_id')->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')->where('pembayarans.user_id', '=', Auth::user()->id)->where('films.id', '=', $data->id)->exists())
                                                <a href="{{ route('watch', $data->id) }}" class="watch-btn"> <span>Watch
                                                        Now</span> <i class="fa fa-angle-right"></i></a>
                                            @else
                                                <button class="follow-btn" type="submit">Add to Cart</button>
                                                <a href="{{ route('watch', $data->id) }}" class="watch-btn"> <span>Watch
                                                        Now</span> <i class="fa fa-angle-right"></i></a>
                                                        @endif
                                                        <!-- <button class="follow-btn" type="submit">Add to Cart</button>
                                                            <a href="{{ route('watch', $data->id) }}" class="watch-btn"> <span>Watch Now</span> <i class="fa fa-angle-right"></i></a> -->
                                                            @elseif(Auth::user()->role == 'admin')
                                                            <a href="{{ route('watch', $data->id) }}" class="watch-btn"> <span>Watch Now</span>
                                                                <i class="fa fa-angle-right"></i></a>
                                                                @endif
                                                                @endguest
                                                            </form>
                                                            <a class="follow-btn mt-2" data-toggle="modal" data-target="#showModal">Trailer</a>
                                                            <div class="modal fade" id="showModal" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content text-white footer">
                                                                    <video src="{{ asset('storage/' . $data->trailer) }}" controls></video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($rate as $r)
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('anime-main/img/anime/review-3.jpg') }}" alt="">
                                    <!-- <span class="fa fa-user-circle-o text-white"></span> -->
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{ $r->users->name }}</h6>
                                    <p>{{ $r['ulasan'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{ url('rating') }}" method="post">
                            @csrf
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            <textarea placeholder="Your Comment" class="text-dark" name="ulasan"></textarea>
                            <input type="hidden" name="film_id" value="{{ $data['id'] }}">
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->


@stop
