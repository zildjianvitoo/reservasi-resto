@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <i class="fas fa-table me-1"></i>
                    List Reservasi
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @php
                    $no = 1;
                @endphp
                    @foreach($reservations as $reservasi)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $reservasi->id }}</td>
                            <td>{{ $reservasi->name }}</td>
                            <td>{{ $reservasi->date }}</td>
                            <td>{{ $reservasi->status }}</td>
                            <td>
                                @if($reservasi->status == 'proses')
                                    <a href="{{ route('admin.reservasi.selesai', ['id'=>$reservasi->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                @endif
                                <a href="{{ route('admin.reservasi.detail', ['id'=>$reservasi->id]) }}" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.reservasi.hapus', ['id'=>$reservasi->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
