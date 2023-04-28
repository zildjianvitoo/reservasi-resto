@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center section-title product__discount__title mb-5">
        <h2>Bill Reservasi</h2>
    </div>
    <div class="row ml-1 mr-1 mb-4">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Bill Reservasi, Kode:
                        <strong>{{ $data['reservasi']->id }}</strong>
                        <span class="float-right"> <strong>Status:</strong> {{ $data['reservasi']->status }}</span>

                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <div>
                                    <strong>{{ $data['reservasi']->name }}</strong>
                                </div>
                                <div>Email : {{ $data['reservasi']->email }}</div>
                                <div>No Telp : {{ $data['reservasi']->phone }}</div>
                                <div>Tanggal : {{ $data['reservasi']->date }}</div>
                                <div>Jumlah Tamu: {{ $data['reservasi']->number_guest }}</div>
                                <div>Meja : {{ $data['reservasi']->tables_name }}</div>
                            </div>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Nama</th>
                                        <th>Diskon</th>

                                        <th class="right">Harga</th>
                                        <th class="center">Jumlah</th>
                                        <th class="right">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                        $total = 0;
                                    @endphp
                                    @foreach($data['items'] as $item)
                                        @if($item->discount == null)
                                            @php
                                                $item->discount = 0
                                            @endphp
                                        @endif
                                        <tr>
                                            <td class="center">{{ $no++ }}</td>
                                            <td class="left strong">{{ $item->name }}</td>
                                            <td class="left">
                                                @if($item->discount)
                                                    {{$item->discount}}%
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="right">Rp. {{ $item->price - ($item->price*($item->discount/100)) }}</td>
                                            <td class="center">{{ $item->quantity }}</td>
                                            @php
                                                $total+=($item->price - ($item->price*($item->discount/100))) * $item->quantity;
                                            @endphp
                                            <td class="right">Rp. {{ ($item->price - ($item->price*($item->discount/100))) * $item->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">

                            </div>

                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear text-center">
                                    <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>Rp. {{$total}}</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
