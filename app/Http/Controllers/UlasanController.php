<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UlasanController extends Controller
{
    public function index(){
        $reviews = DB::table('reviews')
            ->join('accounts','accounts_id','=','accounts.id')
            ->select('name', 'rating', 'message')
            ->paginate(5);
        return view('ulasan', compact('reviews'));
    }

    public function ulasanStore(Request $request){
        DB::table('reviews')
            ->insert([
                'accounts_id' => session('id'),
                'rating'=> $request->rating,
                'message'=>$request->message
            ]);
        return redirect('/ulasan');
    }
}
