<?php

namespace App\Http\Controllers;

use App\Models\ProfilPerusahaan;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman Profil Perusahaan (data dari database, 1 baris).
     */
    public function index(): View
    {
        $profil = ProfilPerusahaan::firstOrFail();

        return view('pages.profile', compact('profil'));
    }
}