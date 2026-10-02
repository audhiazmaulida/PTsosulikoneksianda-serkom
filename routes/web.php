<?php

use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EkskulAdminController;
use App\Http\Controllers\Admin\GaleriAdminController;
use App\Http\Controllers\Admin\KontakAdminController;
use App\Http\Controllers\Admin\ProdukAdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// rute yg bisa di liat oleh user 

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/ekstrakulikuler', [EkskulController::class, 'index'])->name('ekskul.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// rute untuk login admin

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// area admin wajib login 

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/artikel', ArtikelAdminController::class)
        ->names('admin.artikel')
        ->except(['show']);

    Route::resource('admin/produk', ProdukAdminController::class)
        ->names('admin.produk')
        ->except(['show']);

    Route::resource('admin/galeri', GaleriAdminController::class)
        ->names('admin.galeri')
        ->except(['show']);

    Route::resource('admin/ekskul', EkskulAdminController::class)
        ->names('admin.ekskul')
        ->except(['show']);

    // Kontak: bukan resource biasa (gak ada create/edit/update, cuma
    // lihat daftar, lihat detail+balas, tandai dibaca, dan hapus).
    Route::get('/admin/kontak', [KontakAdminController::class, 'index'])->name('admin.kontak.index');
    Route::get('/admin/kontak/{kontak}', [KontakAdminController::class, 'show'])->name('admin.kontak.show');
    Route::post('/admin/kontak/{kontak}/balas', [KontakAdminController::class, 'balas'])->name('admin.kontak.balas');
    Route::post('/admin/kontak/{kontak}/tandai-dibaca', [KontakAdminController::class, 'tandaiDibaca'])->name('admin.kontak.tandai-dibaca');
    Route::delete('/admin/kontak/{kontak}', [KontakAdminController::class, 'destroy'])->name('admin.kontak.destroy');
});