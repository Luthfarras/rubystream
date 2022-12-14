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

    .pagination li a {
            /* border: solid 2px rgb(255, 0, 0) ; */
            background-color: rgb(0, 0, 69);
            /* background-color:none !important;  */
            margin: 5px;
        }

        .pagination li .active {
            background-color: none;
            display: none;
        }
</style>
@section('content')

    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                @foreach ($trend as $hero)
                <div class="hero__items set-bg" data-setbg="{{ $hero->cover }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">{{$hero->genre->genre}}</div>
                                <h2>{{$hero->nama_film}}</h2>
                                <p>{{$hero->sinopsis}}</p>
                                @if(Route::has('login'))
                                <a href="/login"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                @else
                                <a href="{{route('watch',$hero->id)}}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                                        <!-- <div class="col-lg-3 col-md-2 col-sm-2"> -->
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
                                                                @if($cart->where('id', $d->id)->count())
                                                                <button type="" name="button" disabled class="btn btn-sm btn-secondary mt-2">In Cart</button>
                                                                @elseif(DB::table('films')->join('tokens', 'films.id', '=', 'tokens.film_id')->join('pembayarans', 'pembayarans.id', '=', 'tokens.pembayaran_id')->where('pembayarans.user_id', '=', Auth::user()->id)->where('films.id', '=', $d->id)->exists())
                                                                <a href="{{route('watch',$d->id)}}" class="btn btn-sm btn-danger mt-2">Watch this Movie</a>
                                                                @else
                                                                <button class="btn btn-sm btn-primary mt-2" type="submit">Add to Cart</button>
                                                                @endif
                                                            @endif
                                                        @endguest
                                                    </div>
                                            </form>
                                        </div>
                            </div>
                            <div class="modal fade" id="inputModal{{ $d->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content text-white footer">
                                        <video src="{{ asset('storage/' . $d->trailer) }}" controls></video>
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
                </div class="mt-3" >
                    {{-- <div class="product__pagination"> --}}
                        {{ $data->links() }}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>


@endsection
