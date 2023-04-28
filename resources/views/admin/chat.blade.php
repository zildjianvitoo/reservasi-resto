@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <i class="fas fa-table me-1"></i>
                    List Ulasan
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($data as $chat)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $chat->username }}</td>
                        <td>
                            @if($chat->status == "Belum dibalas")
                                <div class="text-danger">
                                    {{ $chat->status }}
                                    <i class="fa fa-warning"></i>
                                </div>
                            @else
                                <div class="text-success">
                                    {{ $chat->status }}
                                    <i class="fa fa-check"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ URL::to('adsmin/pesan/'.$chat->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-reply"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
