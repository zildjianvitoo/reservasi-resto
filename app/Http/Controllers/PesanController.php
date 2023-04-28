<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function index(){
        $chats = DB::table('chats')
            ->where('accounts_id', '=', session('id'))
            ->get();

        return view('chat', compact('chats'));
    }

    public function send(Request $request){
        DB::table('chats')
            ->insert([
               'accounts_id' => session('id'),
               'message' => $request->message,
                'type' => 'sent'
            ]);

        return redirect('/pesan');
    }

    public function adminIndex(){
        $chat_accounts = DB::table('chats')
            ->select('accounts_id')
            ->groupBy('accounts_id')
            ->get();

        $data = array();

        foreach ($chat_accounts as $account) {
            $chats = DB::table('accounts')
                ->where('id','=', $account->accounts_id)
                ->select('id', 'username')
                ->first();

            $status = DB::table('chats')
                ->where('accounts_id', '=', $account->accounts_id)
                ->orderByDesc('id')
                ->first()->type;

            $chats->status = $status == "sent" ? "Belum dibalas" : "Sudah dibalas";

            $data[] = $chats;
        }

        return view('admin.chat', compact('data'));
    }

    public function adminDetailIndex(Request $request){
        $chats = DB::table('chats')
            ->where('accounts_id', '=', $request->id)
            ->get();

        return view('admin.chat-detail', compact('chats'));
    }

    public function adminSend(Request $request){
        DB::table('chats')
            ->insert([
                'accounts_id' => session('id'),
                'message' => $request->message,
                'type' => 'received'
            ]);

        return redirect('/adsmin/pesan');
    }
}
