@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Edit Galeri
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galeri.edit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <img class="img img-thumbnail" src="{{ asset('storage/images/'.$galeri->gambar) }}" alt="tidak ada gambar" width="600px" height="400px">
                <br>
                <input type="number" name="id" value="{{ $galeri->id }}" hidden>
                <div class="form-group mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
