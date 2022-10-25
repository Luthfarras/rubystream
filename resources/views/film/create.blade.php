<div class="modal fade" id="createfilm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content text-white footer p-0">

        <form action="{{ url('genre')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <label class="mb-3 fs-2">Input Film</label>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('nama_film') is-invalid @enderror" id="nama_film" placeholder="Film Name" name="nama_film" value="{{old('nama_film')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('studio') is-invalid @enderror" id="studio" placeholder="Studio" name="studio" value="{{old('studio')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('harga') is-invalid @enderror" id="harga" placeholder="Price" name="harga" value="{{old('harga')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('tahun_rilis') is-invalid @enderror" id="tahun_rilis" placeholder="Release Year" name="tahun_rilis" value="{{old('tahun_rilis')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('aktor') is-invalid @enderror" id="aktor" placeholder="Actors" name="aktor" value="{{old('aktor')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('sinopsis') is-invalid @enderror" id="sinopsis" placeholder="Sinopsis" name="sinopsis" value="{{old('sinopsis')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('tahun_rilis') is-invalid @enderror" id="tahun_rilis" placeholder="Release Year" name="tahun_rilis" value="{{old('tahun_rilis')}}">
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="form-control form-control-sm @error('tahun_rilis') is-invalid @enderror" id="tahun_rilis" placeholder="Release Year" name="tahun_rilis" value="{{old('tahun_rilis')}}">
                </div>
                <div class="form-group mt-2">
                    <select name="genre_id" id="" class="custom-select custom-select-sm @error('tahun_rilis') is-invalid @enderror" required>
                        {{-- @foreach ($data as $item) --}}
                            <option value="{{old('tahun_rilis')}}"></option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                <div class="form-group mt-2">
                    <input type="file" class="@error('cover') is-invalid @enderror" id="cover" placeholder="Cover" name="cover" value="{{old('cover')}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-dark text-white">Input</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>

        </div>
    </div>
</div>