<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ReservationController extends Controller
{
    public function index(){
        return view('tamu');
    }

    public function reservasi(Request $request){
        $jumlah_tamu = $request->jumlah_tamu;
        $max_capacity = DB::table('tables')
            ->select('capacity')
            ->orderByDesc('capacity')
            ->first()->capacity;

        $mejas = [];

        $setA = DB::table('tables')
            ->select('tables.*');

        $setB = DB::table('reservations')
            ->where('date','=',$request->date)
            ->whereNot('status','=','selesai')
            ->select('tables_id');

        while(!count($mejas)){
            $mejas = $setA->leftJoinSub($setB, 'setB', function ($join) {
                $join->on('tables.id', '=', 'setB.tables_id')
                    ->whereRaw('setB.tables_id IS NULL');
            })->where('capacity', '>=', $jumlah_tamu)
                ->whereBetween('capacity', [0, $jumlah_tamu+2])
                ->get();
            $jumlah_tamu++;
            if($jumlah_tamu > $max_capacity){
                break;
            }
        }

        $menus = DB::table('menus')
            ->join('categories', 'categories_id', '=', 'categories.id')
            ->select('menus.id', 'menus.gambar', 'menus.name', 'menus.price', 'categories.name as kategori')
            ->get();

        $data = [
            'mejas' => $mejas,
            'menus' => $menus
        ];

        return view('reservasi', compact('data'));
    }

    public function store(Request $request){
        $reserve_id = uniqid();
        DB::table('reservations')
            ->insert([
                'id'=> $reserve_id,
               'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'date'=>$request->date,
                'number_guest'=>$request->number_guest,
                'status'=>'proses',
                'tables_id'=>$request->tables_id,
                'accounts_id'=>session('id'),
            ]);
        $index = 0;
        $quantity_arr = array();
        foreach ($request->quantity as $item){
            if($item != null){
                array_push($quantity_arr, $item);
            }
        }

        foreach ($request->id as $menu) {
            DB::table('reservation_items')
                ->insert([
                    'reservations_id'=>$reserve_id,
                    'menus_id'=> $menu,
                    'quantity'=> $quantity_arr[$index]
            ]);
            $index++;
        }

        return redirect('/riwayat');
    }

    public function history(){
        $reservations = DB::table('reservations')
            ->join('tables','tables_id','=','tables.id')
            ->where('accounts_id','=',session('id'))
            ->select('reservations.*', 'tables.name as tables_name')
            ->paginate(5);

        return view('riwayat', compact('reservations'));
    }

    public function historyDetail(Request $request){
        $reservasi = DB::table('reservations')
            ->join('tables','tables_id','=','tables.id')
            ->where('accounts_id','=',session('id'))
            ->where('reservations.id', '=', $request->id)
            ->select('reservations.*', 'tables.name as tables_name')
            ->first();

        $items = DB::table('reservation_items')
            ->join('menus', 'menus_id', '=', 'menus.id')
            ->leftJoin('categories', 'categories_id', '=', 'categories.id')
            ->leftJoin('flash_sales', 'flash_sales_id', '=', 'flash_sales.id')
            ->select('menus.name', 'flash_sales.discount', 'menus.price', 'reservation_items.quantity')
            ->where('reservations_id', '=', $request->id)
            ->get();

        $data = [
          'reservasi' => $reservasi,
          'items' => $items
        ];

        return view('riwayat-detail', compact('data'));
    }
}