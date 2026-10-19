<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(Request $request): View
    {
        $kategoriAktif = strtolower($request->query('kategori', 'semua'));

        $galeris = Galeri::when($kategoriAktif !== 'semua', function ($query) use ($kategoriAktif) {
                $query->whereRaw('LOWER(kategori) = ?', [$kategoriAktif]);
            })
            ->orderByDesc('tanggal')
            ->get();

                $filters = ['Semua', 'Kegiatan', 'Kantor', 'Proyek'];

        return view('pages.galeri', compact('galeris', 'filters', 'kategoriAktif'));
    }
}