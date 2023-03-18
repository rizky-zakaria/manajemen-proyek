<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;

class KalenderController extends Controller
{

    public function __construct()
    {
        $this->modul = 'Kalender';
    }

    public function index()
    {
        $modul = $this->modul;
        $data = Kalender::all();
        return view('kalender.index', compact('modul', 'data'));
    }

    public function store(Request $request)
    {
        $post = Kalender::create([
            'kegiatan' => $request->kegiatan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai
        ]);
        if ($post) {
            toast('Berhasil menambahkan event!', 'success');
        } else {
            toast('Gagal menambahkan event!', 'error');
        }

        return redirect()->back();
    }
}
