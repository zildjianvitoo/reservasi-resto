@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <i class="fas fa-table me-1"></i>
                    List Menu
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('admin.galeri.tambah') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @php
                $no = 1;
                @endphp
                    @foreach($galeris as $galeri)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/images/'.$galeri->gambar) }}" alt="tidak ada gambar" width="150px" height="150px">
                            </td>
                            <td>
                                <a href="{{ route('admin.galeri.edit', ['id'=>$galeri->id]) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.galeri.hapus', ['id'=>$galeri->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
