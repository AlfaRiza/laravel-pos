@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Level Harga</h1>
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
            <a href="/createLevelHarga" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Level Harga</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($level as $s)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $s->nama_level }}</td>
            <td>{{ $s->deskripsi }}</td>
            <td>
                <!-- <a href="/detailSupplier/{{ $s->id }}" class="text-primary"><i class="fas fa-info"></i></a> |  -->
                <a href="/editLevelHarga/{{ $s->id }}" class="text-success"><i class="fas fa-edit"></i></a> | 
                <a href="#" class="text-danger ml-2" data-toggle="modal" data-target="#delete{{ $s->id }}"><i class="fas fa-trash"></i></a>
            </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="delete{{ $s->id }}" tabindex="-1" aria-labelledby="delete{{ $s->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete{{ $s->id }}Label">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus Data supplier {{ $s->nama_satuan }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/levelHarga/{{ $s->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white btn btn-danger">Yakin</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            @empty
            <tr>
            <td colspan="6" class="text-center">Data kosong</td>
            </tr>
            @endforelse
            
        </tbody>
        </table>
        </div>
    </div>
</div>
@endsection