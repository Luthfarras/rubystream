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
                    <span>{{$data->genre->genre}}</span>
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
                    <div class="anime__details__pic set-bg" data-setbg="{{ ($data['cover']) }}">
                        <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ ($data['nama_film']) }}</h3>
                            <span>{{ ($data['nama_film']) }}</span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div>
                        <p>{{ ($data['sinopsis']) }}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <!-- <li><span>Type:</span> TV Series</li> -->
                                        <li><span>Studios:</span> {{ ($data['studio']) }}</li>
                                        <li><span>Year:</span> {{ ($data['tahun_rilis']) }}</li>
                                        <!-- <li><span>Status:</span> Airing</li> -->
                                        <li><span>Genre:</span> {{$data->genre->genre}}</li>
                                    </ul>
                                </div>
                                <!-- <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> 7.31 / 1,515</li>
                                        <li><span>Rating:</span> 8.5 / 161 times</li>
                                        <li><span>Duration:</span> 24 min/ep</li>
                                        <li><span>Quality:</span> HD</li>
                                        <li><span>Views:</span> 131,541</li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <div class="anime__details__btn">
                          <form class="" action="{{ url('cartlist2/'.$data->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="id" value="{{ ($data['id']) }}">
                          <input type="hidden" name="nama_film" value="{{ ($data['nama_film']) }}">
                          <input type="file" name="cover" value="{{ ($data['cover']) }}" hidden>
                          <input type="hidden" name="harga" value="{{ ($data['harga']) }}">
                          @guest
                          @if(Route::has('login'))
                          <!-- <p>p</p> -->
                          @endif
                          @else
                            @if(Auth::user()->role == 'user')
                                  <button class="follow-btn" type="submit">Add to Cart</button>
                                  <a href="{{route('watch',$data->id)}}" class="watch-btn"> <span>Watch Now</span> <i class="fa fa-angle-right"></i></a>

                            @endif
                          @endguest
                          </form>

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
                        @foreach($rate as $r)
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('anime-main/img/anime/review-3.jpg')}}" alt="">
                                <!-- <span class="fa fa-user-circle-o text-white"></span> -->
                            </div>
                            <div class="anime__review__item__text">
                                <h6>{{$r->users->name}}</h6>
                                <p>{{$r['ulasan']}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{url('rating')}}" method="post">
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
                            <input type="hidden" name="film_id" value="{{ ($data['id']) }}">
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->


@stop
