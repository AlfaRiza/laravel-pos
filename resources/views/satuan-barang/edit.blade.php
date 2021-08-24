@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        <form action="/satuanBarang/{{ $data->id }}" method="post">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="nama_satuan" class="form-label">Nama Satuan</label>
                <input type="text" name="nama_satuan" class="form-control @error('nama_satuan') is-invalid @enderror" id="nama_satuan" value="{{ $data->nama_satuan }}">
                @error('nama_satuan')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi <small>(optional)</small></label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ $data->deskripsi }}</textarea>
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