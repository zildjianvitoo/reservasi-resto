@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form edit Menu
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menu.edit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="number" name="id" value="{{ $menus['menu']->id }}" hidden="">
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Menu" name="name" value="{{ $menus['menu']->name }}">
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Harga</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Harga" name="price" value="{{ $menus['menu']->price }}">
                </div>
                <div class="form-group mb-2">
                    <label for="inputState">Kategori</label>
                    <select id="inputState" class="form-control" name="categories_id">
                        <option readonly hidden>Pilih Kategori</option>
                        @foreach($menus['categories'] as $category)
                            @if($category->id == $menus['menu']->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="inputState">Flash Sale</label>
                    <select id="inputState" class="form-control" name="flash_sales_id">
                        <option readonly hidden>Pilih Flash Sale</option>
                        <option value="" selected>Tidak ada</option>
                        @foreach($menus['flash_sales'] as $flash_sale)
                            @if($flash_sale->id == $menus['menu']->category_id)
                                <option value="{{ $flash_sale->id }}" selected>{{ $flash_sale->name }}</option>
                            @else
                                <option value="{{ $flash_sale->id }}">{{ $flash_sale->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
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
