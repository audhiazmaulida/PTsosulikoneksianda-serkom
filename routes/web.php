<?php

use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriAdminController;
use App\Http\Controllers\Admin\KontakAdminController;
use App\Http\Controllers\Admin\ProdukAdminController;
use App\Http\Controllers\Admin\ProfilAdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute publik (bisa dilihat semua orang)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');    
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// Login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Area admin (wajib login)
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/produk', ProdukAdminController::class)
        ->names('admin.produk')
        ->except(['show']);

    Route::resource('admin/artikel', ArtikelAdminController::class)
        ->names('admin.artikel')
        ->except(['show']);

    Route::resource('admin/galeri', GaleriAdminController::class)
        ->names('admin.galeri')
        ->except(['show']);

    // Kontak: hanya lihat, balas, tandai dibaca, dan hapus
    Route::get('/admin/kontak', [KontakAdminController::class, 'index'])->name('admin.kontak.index');
    Route::get('/admin/kontak/{kontak}', [KontakAdminController::class, 'show'])->name('admin.kontak.show');
    Route::post('/admin/kontak/{kontak}/balas', [KontakAdminController::class, 'balas'])->name('admin.kontak.balas');
    Route::post('/admin/kontak/{kontak}/tandai-dibaca', [KontakAdminController::class, 'tandaiDibaca'])->name('admin.kontak.tandai-dibaca');
    Route::delete('/admin/kontak/{kontak}', [KontakAdminController::class, 'destroy'])->name('admin.kontak.destroy');

    // Profil Perusahaan: halaman statis, hanya bisa diedit (tanpa tambah/hapus)
    Route::get('/admin/profil', [ProfilAdminController::class, 'edit'])->name('admin.profil.edit');
    Route::put('/admin/profil', [ProfilAdminController::class, 'update'])->name('admin.profil.update');
    });