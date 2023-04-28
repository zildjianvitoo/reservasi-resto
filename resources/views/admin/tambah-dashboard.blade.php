@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Tambah Akun
        </div>
        <div class="card-body">
            <form action="{{ route('admin.akun.edit.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Meja" name="name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" id="inputAddress" placeholder="Nama Meja" name="email" required>
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress">Password</label>
                    <input type="password" class="form-control" id="inputAddress" placeholder="Nama Meja" name="password" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
