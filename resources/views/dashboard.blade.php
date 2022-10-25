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
@section('hero')

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

@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="trending__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Trending Now</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                  @if(!empty($data))
                  @foreach($data as $d)
                  <div class="col-lg-4 col-md-6 col-sm-6">
                      <div class="product__item">
                        <div class="">
                          <img id="myImg" src="{{ ($d['cover']) }}" style="width:100%;max-width:300px" data-toggle="modal" data-target="#inputModal">

                        </div>
                          <!-- <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'.$d->cover) }}"> -->
                              <!-- <div class="ep">18 / 18</div> -->
                              <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                              <!-- <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
                          <!-- </div> -->
                          <div class="product__item__text">
                              <!-- <ul>
                                  <li>Active</li>
                                  <li>Movie</li>
                              </ul> -->
                              <h5><a href="#">{{ $d['nama_film'] }}</a></h5>
                              @guest
                              @if (Route::has('login'))
                              <button>haloo</button>
                              @elseif(Auth::user()->role == 'user')
                              <button class="btn btn-sm btn-primary mt-2">Add to Cart</button>
                              @endif
                              @endguest
                          </div>
                      </div>
                  </div>
                  @endforeach
                  @else
                  <p>Data Kosong</p>
                  @endif
                  <!-- <a class="btn btn-dark " href="" data-toggle="modal" data-target="#inputModal">Input Genre</a> -->

                  <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content text-white footer">
                            <video src="{{ asset('vid/'.$d->trailer) }}" controls></video>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="popular__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Popular Shows</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="recent__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Recently Added Shows</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="live__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Live Action</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="product__sidebar">
                <div class="product__sidebar__view">
                    <div class="section-title">
                        <h5>Top Views</h5>
                    </div>
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Day</li>
                        <li data-filter=".week">Week</li>
                        <li data-filter=".month">Month</li>
                        <li data-filter=".years">Years</li>
                    </ul>
                    <div class="filter__gallery">
                        <div class="product__sidebar__view__item set-bg mix day years"
                        data-setbg="{{ asset('anime-main/img/sidebar/tv-1.jpg') }}">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Boruto: Naruto next generations</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg mix month week"
                    data-setbg="{{ asset('anime-main/img/sidebar/tv-2.jpg') }}">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix week years"
                data-setbg="{{ asset('anime-main/img/sidebar/tv-3.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Sword art online alicization war of underworld</a></h5>
            </div>
            <div class="product__sidebar__view__item set-bg mix years month"
            data-setbg="{{ asset('anime-main/img/sidebar/tv-4.jpg') }}">
            <div class="ep">18 / ?</div>
            <div class="view"><i class="fa fa-eye"></i> 9141</div>
            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
        </div>
        <div class="product__sidebar__view__item set-bg mix day"
        data-setbg="{{ asset('anime-main/img/sidebar/tv-5.jpg') }}">
        <div class="ep">18 / ?</div>
        <div class="view"><i class="fa fa-eye"></i> 9141</div>
        <h5><a href="#">Fate stay night unlimited blade works</a></h5>
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


@endsection
