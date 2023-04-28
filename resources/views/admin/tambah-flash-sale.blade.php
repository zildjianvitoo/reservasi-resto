@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Tambah Flash Sale
        </div>
        <div class="card-body">
            <form action="{{ route('admin.flash-sale.tambah.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Flash Sale" name="name">
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Diskon</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Diskon" name="discount">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
