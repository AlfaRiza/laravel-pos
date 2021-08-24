@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        <form action="/levelHarga" method="post">
        @csrf
            <div class="mb-3">
                <label for="nama_level" class="form-label">Nama Level</label>
                <input type="text" name="nama_level" class="form-control @error('nama_level') is-invalid @enderror" id="nama_level" value="{{ old('nama_level') }}">
                @error('nama_level')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi <small>(optional)</small></label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection