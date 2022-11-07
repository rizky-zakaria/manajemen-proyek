<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\JenisProyek;
use Illuminate\Http\Request;

class JenisProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->modul = "jenis-proyek";
    }

    public function index()
    {
        $data = JenisProyek::all();
        $modul = $this->modul;
        return view('jenisproject.index', compact('data', 'modul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new JenisProyek;
        $post->jenis = $request->jenis;
        $post->bidang = $request->bidang;
        $post->save();
        // dd($post);
        if ($post) {
            toast('success', 'Berhasil menambahkan data');
            return redirect(route('jenis-proyek.index'));
        } else {
            toast('error', 'Gagal menambahkan data');
            return redirect(route('jenis-proyek.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = JenisProyek::find($id);
        $data = Dokumen::where('jenis_id', $id)->get();
        // dd($data);
        if (isset($data->id)) {
            $data->delete();
        }
        $post->delete();
        if ($post) {
            toast('Berashil menghapus data!', 'success');
            return redirect(route($this->modul . '.index'));
        } else {
            toast('Gagal menghapus data!', 'error');
            return redirect(route($this->modul . '.index'));
        }
    }
}
