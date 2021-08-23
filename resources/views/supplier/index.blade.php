@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Supplier</h1>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="row my-3">
        <div class="col">
            <a href="/createSupplier" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Supplier</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($supplier as $s)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->alamat }}</td>
            <td>
                <a href="/detailSupplier" class="text-primary"><i class="fas fa-info"></i></a>
                <a href="/editSupplier" class="text-success"><i class="fas fa-edit"></i></a>
                <form action="/supplier" method="POST">
                @csrf
                {{ method('DELETE') }}
                </form>
            </td>
            </tr>
            @empty
            <tr>
            <td colspan="4" class="text-center">Data kosong</td>
            </tr>
            @endforelse
            
        </tbody>
        </table>
        </div>
    </div>
</div>
@endsection