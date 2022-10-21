@extends('template')

@section('hero')

<!-- Signup Section Begin -->
<section class="signup spad">
        <div class="container" style="height:35vh">
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
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success text-white">Update</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal"><a href="/genre" class="text-white" >Cancel</a></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

@endsection