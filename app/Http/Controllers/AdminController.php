<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function menu(){
        $menus = DB::table('menus')
            ->join('categories','categories_id','=','categories.id')
            ->leftJoin('flash_sales','flash_sales_id','=','flash_sales.id')
            ->select('menus.*', 'categories.name as category', 'flash_sales.name as flash_sale')
            ->get();

        return view('admin.menu', compact('menus'));
    }

    public function menuTambah(){
        $categories = DB::table('categories')->get();
        $flash_sales = DB::table('flash_sales')->get();

        $menus = [
            'categories' => $categories,
            'flash_sales' => $flash_sales
        ];

        return view('admin.tambah-menu', compact('menus'));
    }

    public function menuTambahStore(Request $request){
        $image = $request->file('gambar');
        $name = $request->name;
        $price = $request->price;
        $categories_id = $request->categories_id;
        $flash_sales_id = $request->flash_sales_id;

        $imageName = uniqid()."_".$image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);


        DB::table('menus')->insert([
            'name' => $name,
            'price' => $price,
            'gambar' => $imageName,
            'categories_id' => $categories_id,
            'flash_sales_id' => $flash_sales_id
        ]);

        return redirect('/admin/menu');
    }

    public function menuEdit(Request $request){
        $menu = DB::table('menus')
            ->join('categories','categories_id','=','categories.id')
            ->leftJoin('flash_sales','flash_sales_id','=','flash_sales.id')
            ->select('menus.*', 'categories.id as category_id', 'categories.name as category', 'flash_sales.id as flash_sales_id', 'flash_sales.name as flash_sale')
            ->where('menus.id','=',$request->id)
            ->first();

        $categories = DB::table('categories')->get();
        $flash_sales = DB::table('flash_sales')->get();

        $menus = [
            'menu' => $menu,
            'categories' => $categories,
            'flash_sales' => $flash_sales
        ];

        return view('admin.edit-menu', compact('menus'));
    }

    public function menuEditStore(Request $request){
        $image = $request->file('gambar');
        $name = $request->name;
        $price = $request->price;
        $categories_id = $request->categories_id;
        $flash_sales_id = $request->flash_sales_id;

        if($image){
            $imageName = uniqid()."_".$image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            DB::table('menus')
                ->where('id','=',$request->id)
                ->update([
                    'name' => $name,
                    'price' => $price,
                    'gambar' => $imageName,
                    'categories_id' => $categories_id,
                    'flash_sales_id' => $flash_sales_id
                ]);
        }else{
            DB::table('menus')
                ->where('id','=',$request->id)
                ->update([
                'name' => $name,
                'price' => $price,
                'categories_id' => $categories_id,
                'flash_sales_id' => $flash_sales_id
            ]);
        }

        return redirect('/admin/menu');
    }

    public function menuHapus(Request $request){
        DB::table('menus')
            ->where('id', $request->id)
            ->delete();
        return redirect('/admin/menu');
    }

    public function kategori(){
        $categories = DB::table('categories')
            ->get();

        return view('admin.kategori', compact('categories'));
    }

    public function kategoriTambah(){
        return view('admin.tambah-kategori');
    }

    public function kategoriTambahStore(Request $request){
        DB::table('categories')
            ->insert([
                'name'=>$request->name
            ]);

        return redirect('/admin/kategori');
    }

    public function kategoriEdit(Request $request){
        $kategori = DB::table('categories')
            ->where('id','=',$request->id)
            ->first();

        return view('admin.edit-kategori', compact('kategori'));
    }

    public function kategoriEditStore(Request $request){
        DB::table('categories')
            ->where('id','=', $request->id)
            ->update([
                'name'=>$request->name
            ]);
        return redirect('/admin/kategori');
    }

    public function kategoriHapus(Request $request){
        DB::table('categories')
            ->where('id','=', $request->id)
            ->delete();

        return redirect('/admin/kategori');
    }


    public function flashSale(){
        $flash_sales = DB::table('flash_sales')
            ->get();

        return view('admin.flash-sale', compact('flash_sales'));
    }

    public function flashSaleTambah(){
        return view('admin.tambah-flash-sale');
    }

    public function flashSaleTambahStore(Request $request){
        DB::table('flash_sales')
            ->insert([
               'name' => $request->name,
                'discount' => $request->discount
            ]);

        return redirect('/admin/flash-sale');
    }

    public function flashSaleEdit(Request $request){
        $flash_sale = DB::table('flash_sales')
            ->where('id','=',$request->id)
            ->first();

        return view('admin.edit-flash-sale', compact('flash_sale'));
    }

    public function flashSaleEditStore(Request $request){
        DB::table('flash_sales')
            ->where('id','=', $request->id)
            ->update([
                'name' => $request->name,
                'discount' => $request->discount
            ]);

        return redirect('/admin/flash-sale');
    }

    public function flashSaleHapus(Request $request){
        DB::table('flash_sales')
            ->where('id','=', $request->id)
            ->delete();
        return redirect('/admin/flash-sale');
    }

    public function meja(){
        $mejas = DB::table('tables')->get();

        return view('admin.meja', compact('mejas'));
    }

    public function mejaTambah(){
        return view('admin.tambah-meja');
    }

    public function mejaTambahStore(Request $request){
        DB::table('tables')
            ->insert([
                'name' => $request->name,
                'capacity' => $request->capacity
            ]);

        return redirect('/admin/meja');
    }

    public function mejaEdit(Request $request){
        $meja = DB::table('tables')
            ->where('id','=',$request->id)
            ->first();

        return view('admin.edit-meja', compact('meja'));
    }

    public function mejaEditStore(Request $request){
        DB::table('tables')
            ->where('id','=', $request->id)
            ->update([
                'name' => $request->name,
                'capacity' => $request->capacity
            ]);
        return redirect('/admin/meja');
    }

    public function mejaHapus(Request $request){
        DB::table('tables')
            ->where('id','=', $request->id)
            ->delete();
        return redirect('/admin/meja');
    }

    public function reservasi(){
        $reservations = DB::table('reservations')
            ->join('tables','tables_id','=','tables.id')
            ->select('reservations.*', 'tables.name as tables_name')
            ->get();

        return view('admin.reservasi', compact('reservations'));
    }

    public function reservasiSelesai(Request $request){
        DB::table('reservations')
            ->where('id','=',$request->id)
            ->update([
                'status' => 'selesai'
            ]);
        return redirect('/admin/reservasi');
    }

    public function reservasiDetail(Request $request){
        $reservasi = DB::table('reservations')
            ->join('tables','tables_id','=','tables.id')
            ->where('reservations.id', '=', $request->id)
            ->select('reservations.*', 'tables.name as tables_name')
            ->first();

        $items = DB::table('reservation_items')
            ->join('menus', 'menus_id', '=', 'menus.id')
            ->leftJoin('categories', 'categories_id', '=', 'categories.id')
            ->leftJoin('flash_sales', 'flash_sales_id', '=', 'flash_sales.id')
            ->where('reservations_id', '=', $request->id)
            ->select('menus.name', 'flash_sales.discount', 'menus.price', 'reservation_items.quantity')
            ->get();

        $data = [
            'reservasi' => $reservasi,
            'items' => $items
        ];

        return view('admin.detail-reservasi', compact('data'));
    }

    public function reservasiHapus(Request $request){
        DB::table('reservations')
            ->where('id', '=', $request->id)
            ->delete();

        return redirect('/admin/reservasi');
    }

    public function ulasan(){
        $reviews = DB::table('reviews')
            ->join('accounts','accounts_id','=','accounts.id')
            ->select('reviews.id', 'username', 'rating', 'message')
            ->get();
        return view('admin.ulasan', compact('reviews'));
    }

    public function ulasanHapus(Request $request){
        DB::table('reviews')
            ->where('id', '=', $request->id)
            ->delete();

        return redirect('/admin/ulasan');
    }
}