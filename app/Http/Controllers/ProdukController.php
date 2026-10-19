<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
         * Tampilkan halaman Produk / Layanan ...
     */
    public function index(): View
    {
        $produks = Produk::latest()->get();

        return view('pages.produk', compact('produks'));
    }
}
