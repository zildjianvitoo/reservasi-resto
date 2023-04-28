<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function indexLogin(){
        return view('login');
    }

    public function loginProcess(Request $request){
        $account = DB::table('accounts')
                    ->select(['id', 'name', 'username', 'role'])
                    ->where('username','=',$request->username)
                    ->where('password','=',md5($request->password))
                    ->first();

        if($account){
            session(['id' => $account->id]);
            session(['name' => $account->name]);
            session(['username' => $account->username]);
            session(['role' => $account->role]);
            session(['isLogin' => true]);

            if(session('role') == 'admin'){
                return redirect('/admin');
            }else{
                return redirect('/');
            }
        }

        return redirect()->back()->with('message', 'Akun tidak ditemukan, silahkan periksa username dan email yang anda masukkan');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerProcess(Request $request){
        if(session('role') == 'admin'){
            $role = 'admin';
        }else{
            $role = 'user';
        }

        DB::table('accounts')
            ->insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'username'=>$request->username,
                'password'=>md5($request->password),
                'role'=>$role
            ]);

        session()->flush();
        return redirect('/login');
    }

    public function forgetPassword(Request $request){
        return view('forget-password');
    }

    public function forgetPasswordProcess(Request $request){
        $verify = DB::table('accounts')
            ->where('username','=', $request->username)
            ->where('email','=', $request->email)
            ->first();

        if($verify){
            DB::table('accounts')
                ->where('username','=', $request->username)
                ->update([
                    'password'=>md5($request->password)
                ]);
            return redirect('/login');
        }

        return redirect()->back()->with('message', 'Akun tidak ditemukan, silahkan periksa username dan email yang anda masukkan');
    }

    public function logoutProcess(){
        session()->flush();

        return redirect('login');
    }
}
