@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Edit Kategori
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori.edit.store') }}" method="POST">
                @csrf
                <input type="number" name="id" value="{{ $kategori->id }}" hidden>
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Kategori" name="name" value="{{ $kategori->name }}">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
