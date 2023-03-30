<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\HistoryProgres;
use App\Models\JenisProyek;
use App\Models\Progres;
use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $this->modul = "home";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Home";
        $modul = $this->modul;
        $dokumen = count(Dokumen::all());
        $user = count(User::all());
        $jenis = count(JenisProyek::all());
        $proyek = count(Proyek::all());
        $jan = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '01%')->get());
        $feb = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '02%')->get());
        $mar = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '03%')->get());
        $apr = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '04%')->get());
        $mei = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '05%')->get());
        $jun = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '06%')->get());
        $jul = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '07%')->get());
        $ags = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '08%')->get());
        $sep = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '09%')->get());
        $okt = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '10%')->get());
        $nov = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '11%')->get());
        $des = count(Progres::where('created_at', 'LIKE', '%' . date('Y-') . '12%')->get());
        $his = HistoryProgres::offset(0)->limit(10)->get();
        // dd($his);
        if (Auth::user()->role == 'petugas') {
            Alert::info('Informasi', 'Anda Memiliki Satu Proyek Baru');
        }
        return view('home', compact('title', 'dokumen', 'user', 'proyek', 'jenis', 'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'ags', 'sep', 'okt', 'nov', 'des', 'his', 'modul'));
    }
}
