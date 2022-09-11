<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countSuratKeluar = SuratKeluar::count();
        $countSuratMasuk = SuratMasuk::count();
        return view('home', [
            'CSK' => $countSuratKeluar,
            'CSM' => $countSuratMasuk,
        ]);
    }
}
