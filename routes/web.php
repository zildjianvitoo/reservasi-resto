<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'admin', 'middleware'=>['isLogin:true','role:admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

//    Route::get('/akun/tambah', [AdminController::class, 'akunTambah'])->name('admin.akun.tambah');
//    Route::post('/akun/tambah', [AdminController::class, 'akunTambahStore'])->name('admin.akun.tambah.store');
//    Route::get('/akun/edit/{id}', [AdminController::class, 'akunEdit'])->name('admin.akun.edit');
//    Route::post('/akun/edit/{id}', [AdminController::class, 'akunEditStore'])->name('admin.akun.edit.store');
//    Route::get('/akun/hapus/{id}', [AdminController::class, 'akunHapus'])->name('admin.akun.hapus');


    Route::get('/menu', [AdminController::class, 'menu'])->name('admin.menu');
    Route::get('/menu/tambah', [AdminController::class, 'menuTambah'])->name('admin.menu.tambah');
    Route::post('/menu/tambah', [AdminController::class, 'menuTambahStore'])->name('admin.menu.tambah.store');
    Route::get('/menu/edit/{id}', [AdminController::class, 'menuEdit'])->name('admin.menu.edit');
    Route::post('/menu/edit', [AdminController::class, 'menuEditStore'])->name('admin.menu.edit.store');
    Route::get('/menu/hapus/{id}', [AdminController::class, 'menuHapus'])->name('admin.menu.hapus');

    Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
    Route::get('/kategori/tambah', [AdminController::class, 'kategoriTambah'])->name('admin.kategori.tambah');
    Route::post('/kategori/tambah', [AdminController::class, 'kategoriTambahStore'])->name('admin.kategori.tambah.store');
    Route::get('/kategori/edit/{id}', [AdminController::class, 'kategoriEdit'])->name('admin.kategori.edit');
    Route::post('/kategori/edit', [AdminController::class, 'kategoriEditStore'])->name('admin.kategori.edit.store');
    Route::get('/kategori/hapus/{id}', [AdminController::class, 'kategoriHapus'])->name('admin.kategori.hapus');

    Route::get('/flash-sale', [AdminController::class, 'flashSale'])->name('admin.flash-sale');
    Route::get('/flash-sale/tambah', [AdminController::class, 'flashSaleTambah'])->name('admin.flash-sale.tambah');
    Route::post('/flash-sale/tambah', [AdminController::class, 'flashSaleTambahStore'])->name('admin.flash-sale.tambah.store');
    Route::get('/flash-sale/edit/{id}', [AdminController::class, 'flashSaleEdit'])->name('admin.flash-sale.edit');
    Route::post('/flash-sale/edit', [AdminController::class, 'flashSaleEditStore'])->name('admin.flash-sale.edit.store');
    Route::get('/flash-sale/hapus/{id}', [AdminController::class, 'flashSaleHapus'])->name('admin.flash-sale.hapus');

    Route::get('/meja', [AdminController::class, 'meja'])->name('admin.meja');
    Route::get('/meja/tambah', [AdminController::class, 'mejaTambah'])->name('admin.meja.tambah');
    Route::post('/meja/tambah', [AdminController::class, 'mejaTambahStore'])->name('admin.meja.tambah.store');
    Route::get('/meja/edit/{id}', [AdminController::class, 'mejaEdit'])->name('admin.meja.edit');
    Route::post('/meja/edit', [AdminController::class, 'mejaEditStore'])->name('admin.meja.edit.store');
    Route::get('/meja/hapus/{id}', [AdminController::class, 'mejaHapus'])->name('admin.meja.hapus');

    Route::get('/reservasi', [AdminController::class, 'reservasi'])->name('admin.reservasi');
    Route::get('/reservasi/selesai/{id}', [AdminController::class, 'reservasiSelesai'])->name('admin.reservasi.selesai');
    Route::get('/reservasi/detail/{id}', [AdminController::class, 'reservasiDetail'])->name('admin.reservasi.detail');
    Route::get('/reservasi/hapus/{id}', [AdminController::class, 'reservasiHapus'])->name('admin.reservasi.hapus');

    Route::get('/ulasan', [AdminController::class, 'ulasan'])->name('admin.ulasan');
    Route::get('/ulasan/hapus/{id}', [AdminController::class, 'ulasanHapus'])->name('admin.ulasan.hapus');

    Route::get('/pesan', [PesanController::class, 'adminIndex'])->name('admin.pesan');
    Route::get('/pesan/{id}', [PesanController::class, 'adminDetailIndex'])->name('admin.pesan.detail');
    Route::post('/pesan', [PesanController::class, 'adminSend'])->name('admin.pesan.send');

    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/galeri/tambah', [GaleriController::class, 'tambah'])->name('admin.galeri.tambah');
    Route::post('/galeri/tambah', [GaleriController::class, 'tambahProcess'])->name('admin.galeri.tambah.store');
    Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::post('/galeri/edit', [GaleriController::class, 'editProcess'])->name('admin.galeri.edit.store');
    Route::get('/galeri/hapus/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.hapus');
});

Route::middleware('isLogin:')->group(function (){
    Route::get('/login', [AccountController::class, 'indexLogin'])->name('login.index');
    Route::post('/login', [AccountController::class, 'loginProcess'])->name('login.process');
    Route::get('/forget-password', [AccountController::class, 'forgetPassword'])->name('forget-password.index');
    Route::post('/forget-password', [AccountController::class, 'forgetPasswordProcess'])->name('forget-password.process');
});

Route::get('/forget-password', [AccountController::class, 'forgetPassword'])->name('forget-password.index');
Route::get('/register', [AccountController::class, 'register'])->name('register.index');
Route::post('/register', [AccountController::class, 'registerProcess'])->name('register.process');

Route::middleware('isLogin:true')->group(function (){
    Route::get('/logout', [AccountController::class, 'logoutProcess'])->name('logout.process');
});

Route::get('/', [GLobalController::class, 'index'])->name('index');
Route::get('/tentang-kami', [GLobalController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/galeri', [GaleriController::class, 'userIndex'])->name('galeri');
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');


Route::group(['prefix' => '/', 'middleware' => ['isLogin:true', 'role:user']], function () {
    Route::get('/reservasi', [ReservationController::class, 'index'])->name('reservasi.index');
    Route::get('/reservasi/isi-data', [ReservationController::class, 'reservasi'])->name('reservasi');
    Route::post('/reservasi/isi-data', [ReservationController::class, 'store'])->name('reservasi.store');
    Route::get('/riwayat', [ReservationController::class, 'history'])->name('reservasi.riwayat');
    Route::get('/riwayat/{id}', [ReservationController::class, 'historyDetail'])->name('reservasi.riwayat.detail');
    Route::post('/ulasan', [UlasanController::class, 'ulasanStore'])->name('ulasan.store');
    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::post('/pesan', [PesanController::class, 'send'])->name('pesan.send');
});
