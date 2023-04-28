@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Tambah Menu
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menu.tambah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Menu" name="name">
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Harga</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Harga" name="price">
                </div>
                <div class="form-group mb-2">
                    <label for="inputState">Kategori</label>
                    <select id="inputState" class="form-control" name="categories_id">
                        <option readonly hidden>Pilih Kategori</option>
                        @foreach($menus['categories'] as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="inputState">Flash Sale</label>
                    <select id="inputState" class="form-control" name="flash_sales_id">
                        <option readonly hidden>Pilih Flash Sale</option>
                        <option value="">Tidak ada</option>
                        @foreach($menus['flash_sales'] as $flash_sale)
                            <option value="{{ $flash_sale->id }}">{{ $flash_sale->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
