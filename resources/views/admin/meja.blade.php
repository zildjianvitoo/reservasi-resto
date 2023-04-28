@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <i class="fas fa-table me-1"></i>
                    List Meja
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{ route('admin.meja.tambah') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($mejas as $meja)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $meja->name }}</td>
                        <td>{{ $meja->capacity }}</td>
                        <td>
                            <a href="{{ route('admin.meja.edit', ['id'=>$meja->id]) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.meja.hapus', ['id'=>$meja->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
