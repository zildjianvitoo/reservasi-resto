@extends('layouts.app')

@section('content')
    <section class="featured mb-0 pb-0" style="background: #7fad39;padding-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 justify-content-center">
                    <div class="contact-form pt-4 pb-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title tentang-kami-title text-white">
                                        <h2>Reservasi</h2>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('reservasi.store') }}" method="POST">
                                @csrf
                                <input type="datetime-local" name="date" value="{{ request()->query('date') }}" hidden>
                                <input type="number" name="number_guest" value="{{ request()->query('jumlah_tamu') }}" hidden>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" placeholder="Nama" name="name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="col-lg-9 col-sm-6">
                                        <input type="number" min="0" placeholder="Nomor Telepon" name="phone" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <select class="form-control" name="tables_id" style="height: 50px;">
                                            @if(count($data['mejas']))
                                                <option hidden readonly>Pilih Meja</option>
                                                @foreach($data['mejas'] as $meja)
                                                    <option value="{{ $meja->id }}">{{ $meja->name }} - ({{ $meja->capacity }} Orang)</option>
                                                @endforeach
                                            @else
                                                <option hidden readonly>Meja Sudah Penuh</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured mb-0 pt-0 mt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 justify-content-center">
                    <div class="contact-form pt-4 pb-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>Pilih Menu</h2>
                                    </div>
                                </div>
                            </div>
                                    <!-- PILIH MENU -->
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">#</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col" width="20%">Jumlah</th>
                                                <th scope="col">Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['menus'] as $menu)
                                                <tr class="text-center">
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="id[]" value="{{ $menu->id }}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-6 text-right">
                                                                <img src="{{ asset('storage/images/'.$menu->gambar) }}" alt="" width="100px" height="auto"/>
                                                            </div>
                                                            <div class="col-6 text-left">
                                                                {{ $menu->name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Rp. {{ $menu->price }}</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="quantity[]">
                                                    </td>
                                                    <td>{{ $menu->kategori }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- END PILIH MENU -->

                                    <div class="col-lg-12 text-center mt-4">
                                        <button type="submit" class="btn site-btn">Reservasi</button>
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
