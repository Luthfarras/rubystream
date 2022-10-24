@extends('layouts.app')

@section('content')

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('anime-main/img/normal-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>You Profil</h2>
                        <p>{{ Auth::user()->name }} Welcome to the you profil.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>You Profil</h3>
                        <form action="{{ route('update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input__item">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name" autofocus placeholder="Your Name">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username',Auth::user()->username) }}" required autocomplete="username" autofocus placeholder="Username">
                                <span class="icon_id"></span>
                            </div>
                            <div class="input__item">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',Auth::user()->email) }}" required autocomplete="email" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input id="password" type="password" class="form-control" value="{{ old('password',Auth::user()->password) }}" name="password" required autocomplete="new-password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password',Auth::user()->password) }}" required autocomplete="new-password" placeholder="Confirmation Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn"><a class="text-white" href="">Edit</a></button>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>php artisan inspire</h3>
                        <ul class="text-white">
                        “ Simplicity is the essence of happiness. ”
                        </ul>
                        <ul class="text-secondary">
                        — Cedric Bledsoe
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Signup Section End -->

@endsection
