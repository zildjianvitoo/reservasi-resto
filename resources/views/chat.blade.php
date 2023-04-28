@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center section-title product__discount__title">
                <h2>Pesan</h2>
            </div>
        </div>
    </div>
    <div class="row ml-1 mr-1 mb-4">
        <div class="col-lg-2 col-sm-1"></div>
        <div class="col-lg-8 col-sm-10">
            <div class="chat-container">
                @if(count($chats))
                    @foreach($chats as $chat)
                        <div class="chat-bubble {{ $chat->type }} ">
                            <p>{{ $chat->message }}</p>
                            <p class="text-right"><sub>{{ $chat->send_at }}</sub></p>
                        </div>
                    @endforeach
                @else
                    <p class="text-center mt-5">Tidak ada pesan.</p>
                @endif
            </div>
            <form action="{{ route('pesan.send') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Ketik pesanmu disini...">
                    <div class="input-group-append">
                        <button class="btn site-btn pt-0 pb-0" type="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
