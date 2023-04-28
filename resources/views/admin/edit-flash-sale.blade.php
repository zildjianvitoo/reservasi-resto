@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-lines me-1"></i>
            Form Edit Flash Sale
        </div>
        <div class="card-body">
            <form action="{{ route('admin.flash-sale.edit.store') }}" method="POST">
                @csrf
                <input type="number" name="id" value="{{ $flash_sale->id }}" hidden>
                <div class="form-group mb-2">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama Flash Sale" name="name" value="{{ $flash_sale->name }}">
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Diskon</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Diskon" name="discount" value="{{ $flash_sale->discount }}">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
