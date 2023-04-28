@extends('admin.layouts.app')

@section('content')
    <style>
        .chat-container {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 20px;
        }

        .chat-bubble {
            display: inline-block;
            clear: both;
            margin: 10px 0;
            max-width: 60%;
            padding: 8px 12px;
            border-radius: 15px;
            font-size: 16px;
            line-height: 24px;
        }

        .received {
            background-color: #f1f0f0;
            float: left;
        }

        .sent {
            background-color: #007bff;
            color: #fff;
            float: right;
        }

        .input-group {
            margin-top: 20px;
        }
    </style>
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
            <div class="chat-container">
                @if(count($chats))
                    @foreach($chats as $chat)
                        <div class="chat-bubble
                        @if($chat->type == "sent")
                            {{ "received" }}
                        @else
                            {{ "sent" }}
                        @endif
                        ">
                            <p>{{ $chat->message }}</p>
                            <p class="text-right"><sub>{{ $chat->send_at }}</sub></p>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Tidak ada pesan.</p>
                @endif
            </div>
            <form action="{{ route('admin.pesan.send') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Ketik pesanmu disini...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
