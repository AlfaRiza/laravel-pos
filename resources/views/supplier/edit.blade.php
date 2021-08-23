@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        <form action="/supplier/{{ $data->id }}" method="post">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $data->nama }}">
                @error('nama')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat <small>(optional)</small></label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3">{{ $data->alamat }}</textarea>
                @error('alamat')
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