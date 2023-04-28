@extends('layouts.app')

@section('content')
    <section class="featured mb-0" style="background: #7fad39;padding-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 justify-content-center">
                    <div class="contact-form pt-4 pb-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title tentang-kami-title text-white">
                                        <h2>Cek Ketersediaan Meja</h2>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('reservasi') }}">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected readonly>Pilih Meja</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-light">Reservasi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
