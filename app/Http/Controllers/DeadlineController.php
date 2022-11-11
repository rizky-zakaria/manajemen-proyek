<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Proyek;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->modul = "deadline";
    }

    public function index()
    {
        $modul = $this->modul;
        $data = Denda::all();
        // dd();
        return view('deadline.index', compact('modul', 'data'));
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
        return view('deadline.create', compact('modul', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = Denda::where('proyek_id', $request->proyek_id)->first();

        if (isset($cek->id)) {
            toast('Proyek ini sudah memiliki nominal denda!', 'wrong');
            return redirect(route($this->modul . '.create'));
        } else {
            $post = new Denda;
            $post->proyek_id = $request->proyek_id;
            $post->nominal = $request->nominal;
            $post->save();
            if ($post) {
                toast('Berhasil menambahkan data', 'success');
                return redirect(route($this->modul . '.index'));
            } else {
                toast('Gagal menambahkan data!', 'wrong');
                return redirect(route($this->modul . '.create'));
            }
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
