<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalController extends Controller
{
    public function index(){
        $reviews = DB::table('reviews')
            ->join('accounts','accounts_id','=','accounts.id')
            ->select('name', 'rating', 'message')
            ->orderByDesc('rating')
            ->take(5)->get();

        $menus = DB::table('menus')
            ->leftJoin('flash_sales', 'flash_sales_id', '=', 'flash_sales.id')
            ->orderByDesc('menus.id')
            ->select('menus.name', 'menus.price', 'menus.gambar', 'menus.flash_sales_id', 'flash_sales.discount')
            ->take(5)->get();

        $data = [
            'reviews' => $reviews,
            'menus' => $menus
        ];
        return view('hero', compact('data'));
    }

    public function tentangKami(){
        return view('tentang-kami');
    }

    public function contact(){
        return view('contact');
    }

    public function galeri(){
        return view('galeri');
    }
}
