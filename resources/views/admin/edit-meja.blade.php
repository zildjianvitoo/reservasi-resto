@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Edit Meja
        </div>
        <div class="card-body">
            <form action="{{ route('admin.meja.edit.store') }}" method="POST">
                @csrf
                <input type="number" name="id" value="{{ $meja->id }}" hidden>
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Meja" name="name" value="{{ $meja->name }}" required>
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Kapasitas</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Kapasitas" name="capacity" value="{{ $meja->capacity }}" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
