<div class="modal fade" id="editfilm{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content text-white footer p-0">
            <div class="modal-body">
                <label class="mb-4 float-left" style="font-size: 1.4rem;">Edit Film</label>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <form action="{{ route('film.update', $dt->id) }}" method="POST" enctype="multipart/form-data"
                    class="text-left">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <input id="nama_film" type="text" class="form-control form-control-sm" name="nama_film"
                            value="{{ old('name', $dt->nama_film) }}" placeholder="Edit Film Name">
                        {{-- <span class="icon_id"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <input id="studio" type="text" class="form-control form-control-sm" name="studio"
                            value="{{ old('name', $dt->studio) }}" placeholder="Edit Studio Name">
                        {{-- <span class="icon_profile"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <input id="harga" type="text" class="form-control form-control-sm" name="harga"
                            value="{{ old('name', $dt->harga) }}" placeholder="Edit Harga">
                        {{-- <span class="icon_lock"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <input id="tahun_rilis" type="text" class="form-control form-control-sm" name="tahun_rilis"
                            value="{{ old('name', $dt->tahun_rilis) }}" placeholder="Edit Tahun Rrlis">
                        {{-- <span class="icon_lock"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <input id="aktor" type="text" class="form-control form-control-sm" name="aktor"
                            value="{{ old('name', $dt->aktor) }}" placeholder="Edit Actor">
                        {{-- <span class="icon_book"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <input id="sinopsis" type="text" class="form-control form-control-sm" name="sinopsis"
                            value="{{ old('name', $dt->sinopsis) }}" placeholder="Edit Sinopsis">
                        {{-- <span class="icon_book"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <select class=" @error('sinopsis') is-invalid @enderror" name="genre_id">
                            @foreach ($genre as $item)
                                <option value="{{ $item->id }}" {{ old('genre') == $item->id ? 'selected' : '' }}>
                                    {{ $item->genre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <input id="cover" type="text" class="form-control form-control-sm" name="cover"
                            value="{{ old('name', $dt->cover) }}" placeholder="Edit Cover">
                            <div class="">
                                <p>File harus dalam format link.</p>
                            </div>
                        {{-- <span class="icon_mail"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <label for="trailer" class="form-label">Trailer</label><br>
                        <input id="trailer" type="file" class="" name="trailer"
                            value="{{ old('name', $dt->trailer) }}" placeholder="Edit Trailer">
                        {{-- <span class="icon_book"></span> --}}
                    </div>
                    <div class="form-group mt-2">
                        <label for="full_movie" class="form-label">Full Movie</label><br>
                        <input id="full_movie" type="file" class="" name="full_movie"
                            value="{{ old('name', $dt->full_movie) }}" placeholder="Edit Full Movie">
                        {{-- <span class="icon_book"></span> --}}
                    </div>
                    <button type="submit" class="float-right btn btn-success text-white">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
