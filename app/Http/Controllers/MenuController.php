<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request){
        if(isset($request->keyword)){
            $menu = DB::table('menus')
                ->where('name','=',$request->keyword)
                ->paginate(9);
            $kategori = DB::table('categories')->get();
            $flash_sale = DB::table('menus')
                ->join('categories','categories_id','=','categories.id')
                ->leftJoin('flash_sales','flash_sales_id','=','flash_sales.id')
                ->select('menus.*', 'categories.name as category', 'flash_sales.discount')
                ->where('menus.name','=',$request->keyword)
                ->whereNot('flash_sales_id','=',null)
                ->get();

            $menus = [
                'menu'=>$menu,
                'kategori'=>$kategori,
                'flash_sale'=>$flash_sale
            ];
        }else if(isset($request->kategori)){
            $menu = DB::table('menus')
                ->join('categories','categories_id','=','categories.id')
                ->where('categories.name','=',$request->kategori)
                ->paginate(9);
            $kategori = DB::table('categories')->where('name','=',$request->kategori)->get();
            $flash_sale = DB::table('menus')
                ->join('categories','categories_id','=','categories.id')
                ->leftJoin('flash_sales','flash_sales_id','=','flash_sales.id')
                ->select('menus.*', 'categories.name as category', 'flash_sales.discount')
                ->where('categories.name','=',$request->kategori)
                ->whereNot('flash_sales_id','=',null)
                ->get();

            $menus = [
                'menu'=>$menu,
                'kategori'=>$kategori,
                'flash_sale'=>$flash_sale
            ];
        }else{
            $menu = DB::table('menus')->paginate(9);
            $kategori = DB::table('categories')->get();
            $flash_sale = DB::table('menus')
                ->join('categories','categories_id','=','categories.id')
                ->leftJoin('flash_sales','flash_sales_id','=','flash_sales.id')
                ->select('menus.*', 'categories.name as category', 'flash_sales.discount')
                ->whereNot('flash_sales_id','=',null)
                ->get();

            $menus = [
                'menu'=>$menu,
                'kategori'=>$kategori,
                'flash_sale'=>$flash_sale
            ];
        }

        return view('menu', compact('menus'));
    }
}
