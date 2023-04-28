@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Tambah Kategori
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori.tambah.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Kategori" name="name">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
