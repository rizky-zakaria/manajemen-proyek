<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->modul = 'progress';
    }

    public function index()
    {
        $modul = $this->modul;
        $data = Progres::all();
        return view('progres.index', compact('modul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = $this->modul;
        $data = Proyek::all();
        return view('progres.create', compact('modul', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Progres;
        $post->proyek_id = $request->proyek_id;
        $post->progres = "Belum ada";
        $post->persentase = 0;
        $post->save();

        if ($post) {
            toast("Berhasil menambahkan data!", 'success');
            return redirect(route($this->modul . '.index'));
        } else {
            toast('Gagal menambahkan data', 'error');
            return redirect(route($this->modul . '.index'));
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
        //
    }
}
