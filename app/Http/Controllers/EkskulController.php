<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\View\View;

class EkskulController extends Controller
{
    /**
     * Tampilkan halaman Ekstrakurikuler — sekarang dari database.
     */
    public function index(): View
    {
        $ekskuls = Ekskul::orderBy('nama')->get();

        return view('pages.ekskul', compact('ekskuls'));
    }
}