@extends('layouts.app')

@section('content')
    <div class="row mt-3 mb-2">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="container">
                <div class="d-flex justify-content-center section-title product__discount__title mb-5">
                    <h2>Galeri Roemah Elektro</h2>
                </div>
                <div class="row text-center text-lg-start">
                    @foreach($galeris as $galeri)
                        <div class="col-lg-3 col-md-4 col-6">
                            <a class="d-block mb-4 h-100">
                                <img class="img-fluid img-thumbnail" src="{{ asset('storage/images/'.$galeri->gambar) }}" alt="" width="400" height="300">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
