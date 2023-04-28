@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Tambah Meja
        </div>
        <div class="card-body">
            <form action="{{ route('admin.meja.tambah.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Meja" name="name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Kapasitas</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Kapasitas" name="capacity" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
