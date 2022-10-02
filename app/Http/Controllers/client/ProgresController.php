<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Progres;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "";
        $cek = Proyek::where('user_id', Auth::user()->id)->get();
        dd($cek);
        if ($cek == null) {
            toast('Silahkan mengisi parameter penilaian terlebih dahulu!', 'error');
        }
        return view('progres.index', compact('title', 'cek'));
    }

    public function grapichJalan($id)
    {
        $cek = Progres::where('proyek_id', $id)->get();
        if ($cek == null) {
            toast('Silahkan mengisi parameter penilaian terlebih dahulu!', 'error');
            return redirect('data-master/pembangunan-jalan/form-grapich/' . $id);
        }
        $title = "Pembangunan Jalan";
        // $data = 
        return view('progres.index', compact('title', 'cek'));
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
        //
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
