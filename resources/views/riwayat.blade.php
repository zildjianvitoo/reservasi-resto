@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center section-title product__discount__title">
        <h2>Riwayat Reservasi</h2>
    </div>
    <div class="row ml-1 mr-1">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Rincian</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($reservations as $reservasi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $reservasi->name }}</td>
                                <td>{{ $reservasi->date }}</td>
                                <td><a href="{{ route('reservasi.riwayat.detail', ['id'=>$reservasi->id]) }}" class="btn pt-2 pb-2 pl-3 pr-3 site-btn"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $reservations->links() }}
    </div>
@endsection
