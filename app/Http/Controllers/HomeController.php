<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\JenisProyek;
use App\Models\Proyek;
use App\Models\User;
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
        $title = "Home";
        $dokumen = count(Dokumen::all());
        $user = count(User::all());
        $jenis = count(JenisProyek::all());
        $proyek = count(Proyek::all());
        return view('home', compact('title', 'dokumen', 'user', 'proyek', 'jenis'));
    }
}
