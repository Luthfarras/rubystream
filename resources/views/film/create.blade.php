<div class="modal fade" id="createfilm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content text-white footer p-0">

            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="mb-3" style="font-size: 1.4rem;">Input Film</label>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="form-group mt-2">
                        <input type="text"
                            class="form-control form-control-sm @error('nama_film') is-invalid @enderror" id="nama_film"
                            placeholder="Film Name" name="nama_film">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control form-control-sm @error('studio') is-invalid @enderror"
                            id="studio" placeholder="Studio" name="studio">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control form-control-sm @error('harga') is-invalid @enderror"
                            id="harga" placeholder="Price" name="harga">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text"
                            class="form-control form-control-sm @error('tahun_rilis') is-invalid @enderror"
                            id="tahun_rilis" placeholder="Release Year" name="tahun_rilis">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control form-control-sm @error('aktor') is-invalid @enderror"
                            id="aktor" placeholder="Actors" name="aktor">
                    </div>
                    <div class="form-group mt-2">
                        <input type="text"
                            class="form-control form-control-sm @error('sinopsis') is-invalid @enderror" id="sinopsis"
                            placeholder="Sinopsis" name="sinopsis">
                    </div>
                    <div class="form-group mt-2">
                        <select class=" @error('genre') is-invalid @enderror" name="genre_id">
                            @foreach ($genre as $dt)
                                <option selected value="{{ $dt->id }}">{{ $dt->genre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="cover" class="form-label">Cover</label><br>
                        <input type="file" class=" @error('cover') is-invalid @enderror" id="cover"
                            placeholder="Release Year" name="cover">
                    </div>
                    <div class="form-group mt-2">
                        <label for="trailer" class="form-label">Trailer</label><br>
                        <input type="file" class=" @error('trailer') is-invalid @enderror" id="trailer"
                            placeholder="Release Year" name="trailer">
                    </div>
                    {{-- <div class="form-group mt-2">
                    </div> --}}
                    <div class="form-group mt-2">
                        <label for="full_movie" class="form-label">Full Movie</label><br>
                        <input type="file" class="@error('full_movie') is-invalid @enderror" id="full_movie"
                            placeholder="full_movie" name="full_movie">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-dark text-white">Input</button>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal"
                            style="float: right;">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
