<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function userIndex(){
        $galeris = DB::table('galeri')->get();
        return view('galeri', compact('galeris'));
    }

    public function index(){
        $galeris = DB::table('galeri')->get();
        return view('admin.galeri', compact('galeris'));
    }

    public function tambah(){
        return view('admin.tambah-galeri');
    }

    public function tambahProcess(Request $request){
        $image = $request->file('gambar');
        $imageName = uniqid()."_".$image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);

        DB::table('galeri')->insert([
            'gambar' => $imageName
        ]);

        return redirect('admin/galeri');
    }

    public function edit(Request $request){
        $galeri = DB::table('galeri')->where('id','=',$request->id)->first();
        return view('admin.edit-galeri', compact('galeri'));
    }

    public function editProcess(Request $request){
        $image = $request->file('gambar');
        $imageName = uniqid()."_".$image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);

        DB::table('galeri')
            ->where('id', '=', $request->id)
            ->update([
            'gambar' => $imageName
            ]);
        return redirect('admin/galeri');
    }

    public function delete(Request $request){
        DB::table('galeri')
            ->where('id', '=', $request->id)
            ->delete();
        return redirect('admin/galeri');
    }
}
