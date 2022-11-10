@extends('template')
<style media="screen">
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.5s;
    }

    #myImg:hover {
        opacity: 0.5;
    }
</style>
@section('content')

    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{ asset('anime-main/img/hero/hero-1.jpg') }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('anime-main/img/hero/hero-1.jpg') }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('anime-main/img/hero/hero-1.jpg') }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="row">
                                @if (!empty($data))
                                    @foreach ($data as $d)
                                        <div class="col-lg-2">
                                            <form class="" action="{{ url('cartlist/' . $d->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="product__item">
                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                    <input type="hidden" name="nama_film" value="{{ $d->nama_film }}">
                                                    <input type="file" name="cover" value="{{ $d->cover }}" hidden>
                                                    <input type="hidden" name="harga" value="{{ $d->harga }}">
                                                    <div class="product__item__pic set-bg" data-setbg="{{ $d->cover }}"
                                                        id="myImg" data-toggle="modal"
                                                        data-target="#inputModal{{ $d->id }}"></div>
                                                    <div class="product__item__text">
                                                        <h5><a href="{{ route('detail', $d->id) }}">{{ $d->nama_film }}</a>
                                                        </h5>
                                                        @guest
                                                            @if (Route::has('login'))
                                                                <!-- <p>p</p> -->
                                                            @endif
                                                        @else
                                                            @if (Auth::user()->role == 'user')
                                                                <button class="btn btn-sm btn-primary mt-2" type="submit">Add
                                                                    to Cart</button>
                                                            @endif
                                                        @endguest
                                                    </div>
                                            </form>
                                        </div>
                            </div>
                            <div class="modal fade" id="inputModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content text-white footer">
                                        <video src="{{ asset('vid/' . $d->trailer) }}" controls></video>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>Data Kosong</p>
                            @endif
                            <!-- <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a> -->

                        </div>
                    </div>
                </div>
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>New Comment</h5>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{ asset('anime-main/img/sidebar/comment-1.jpg') }}" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{ asset('anime-main/img/sidebar/comment-2.jpg') }}" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{ asset('anime-main/img/sidebar/comment-3.jpg') }}" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="{{ asset('anime-main/img/sidebar/comment-4.jpg') }}" alt="">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li>Active</li>
                                <li>Movie</li>
                            </ul>
                            <h5><a href="#">Monogatari Series: Second Season</a></h5>
                            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>


@endsection
